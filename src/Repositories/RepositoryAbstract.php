<?php

namespace A2insights\Laracep\Repositories;

use A2insights\Laracep\Address;
use A2insights\Laracep\AddressFactory;
use A2insights\Laracep\Contracts\CepRepositoryContract;
use A2insights\Laracep\Contracts\ClientContract;
use A2insights\Laracep\Contracts\Transformable;
use A2insights\Laracep\Resources\AddressTransformer;
use A2insights\Laracep\Exceptions\CepServiceException;
use Illuminate\Support\Facades\Log;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;

abstract class RepositoryAbstract implements CepRepositoryContract, Transformable
{
    protected ClientContract $client;
    protected Transformable $addressTransform;
    protected Manager $manager;
    private string $responseContents;
    private array $fallbackClients = [];
    private int $currentClientIndex = 0;

    public function __construct($client)
    {
        $this->client = app($client);
        $this->addressTransform = app(AddressTransformer::class);
        $this->manager = new Manager();
        $this->manager->setSerializer(app(ArraySerializer::class));
    }

    public function addFallbackClient(string $clientClass): self
    {
        $this->fallbackClients[] = $clientClass;
        return $this;
    }

    public function get(string $cep): ?array
    {
        $attempts = 0;
        $maxAttempts = count($this->fallbackClients) + 1; // +1 for the primary client

        while ($attempts < $maxAttempts) {
            try {
                $client = $this->getNextClient();
                $this->responseContents = $client
                    ->setUri($cep)
                    ->request()
                    ->getBody()
                    ->getContents();

                return $this->createData();
            } catch (CepServiceException | \Exception $e) {
                Log::error("Error getting CEP: $cep from " . get_class($client) .
                    ": Message: {$e->getMessage()}");
                $attempts++;
                continue;
            }
        }

        return null;
    }

    protected function getNextClient(): ClientContract
    {
        if ($this->currentClientIndex === 0) {
            $this->currentClientIndex++;
            return $this->client;
        }

        $index = ($this->currentClientIndex - 1) % count($this->fallbackClients);
        $this->currentClientIndex = ($this->currentClientIndex + 1) % (count($this->fallbackClients) + 1);

        return app($this->fallbackClients[$index]);
    }

    protected function createData(): ?array
    {
        $data = $this->parseContents($this->responseContents);

        return $data;
    }

    abstract public function transform(array $data): array;

    protected function parseContents($responseContent)
    {
        return json_decode($responseContent, true);
    }
}
