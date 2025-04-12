<?php

namespace A2insights\Laracep\Handlers;

use A2insights\Laracep\Contracts\ClientContract;
use A2insights\Laracep\Exceptions\CepServiceException;
use Exception;

class RoundRobinCepHandler extends AbstractCepHandler
{
    private array $clients;
    private int $currentIndex = 0;

    public function __construct(array $clients)
    {
        $this->clients = $clients;
    }

    public function handle(string $cep): ?array
    {
        $attempts = 0;
        $maxAttempts = count($this->clients);

        while ($attempts < $maxAttempts) {
            $client = $this->getNextClient();

            try {
                $response = $this->tryClient($client, $cep);
                if ($response) {
                    return $response;
                }
            } catch (CepServiceException $e) {
                // Log the error if needed
                continue;
            }

            $attempts++;
        }

        return $this->tryNext($cep);
    }

    private function getNextClient(): ClientContract
    {
        $client = $this->clients[$this->currentIndex];
        $this->currentIndex = ($this->currentIndex + 1) % count($this->clients);
        return $client;
    }

    private function tryClient(ClientContract $client, string $cep): ?array
    {
        try {
            $client->setUri($cep);
            $response = $client->request();

            if ($response->getStatusCode() !== 200) {
                throw new CepServiceException("Service returned status code: " . $response->getStatusCode());
            }

            $data = json_decode($response->getBody(), true);

            if (empty($data) || isset($data['erro'])) {
                throw new CepServiceException("Service returned empty data or error");
            }

            return $data;
        } catch (Exception $e) {
            throw new CepServiceException("Service request failed: " . $e->getMessage());
        }
    }
}
