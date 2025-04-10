<?php

namespace A2insights\Laracep\Repositories;

use A2insights\Laracep\Address;
use A2insights\Laracep\AddressFactory;
use A2insights\Laracep\Contracts\CepRepositoryContract;
use A2insights\Laracep\Contracts\ClientContract;
use A2insights\Laracep\Contracts\Transformable;
use A2insights\Laracep\Resources\AddressTransformer;
use GuzzleHttp\Exception\BadResponseException;
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

    public function __construct($client)
    {
        /* @var ClientContract */
        $this->client = app($client);
        $this->addressTransform = app(AddressTransformer::class);
        $this->manager =  new Manager();
        $this->manager->setSerializer(app(ArraySerializer::class));

    }
    public function get(string $cep): ?Address
    {
        try{
            $this->responseContents = $this->client
                ->setUri($cep)
                ->request()
                ->getBody()
                ->getContents();

        } catch (BadResponseException | \Exception $e) {
            Log::error("Error to get cep: $cep: Message: {$e->getMessage()}");
            return null;
        }

        return AddressFactory::create($this->createData());
    }

    protected function createData(): ?array
    {
        $data = $this->parseContents($this->responseContents);

        return $this->manager
            ->createData(
                new Item($this->transform($data), $this->addressTransform)
            )->toArray();
    }

    abstract public function transform(array $data): array;

    /**
     * Parse response content
     *
     * @param $responseContent
     * @return mixed
     */
    protected function parseContents($responseContent)
    {
        return json_decode($responseContent);
    }
}
