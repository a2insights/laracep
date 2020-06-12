<?php

namespace Atiladanvi\CepRepository\Repositories;

use Atiladanvi\CepRepository\Contracts\CepRepositoryContract;
use GuzzleHttp\Exception\BadResponseException;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;

/**
 * Class CepRepositoryAbstract
 * @package Atiladanvi\CepRepository\Repositories
 */
class CepRepositoryAbstract implements CepRepositoryContract
{
    protected $client;

    protected $fractal;

    protected $manager;

    private $responseContents;

    public function __construct($client, $fractal)
    {
        $this->client = app($client);
        $this->fractal = app($fractal);
        $this->manager =  new Manager();
        $this->manager->setSerializer(app(ArraySerializer::class));
    }

    public function get(string $cep)
    {
        try{
            $this->responseContents = $this->client
                ->setCep($cep)
                ->request()
                ->getBody()
                ->getContents();
        }catch (BadResponseException $ex) {
            return null;
        }

        return $this->createData();
    }

    protected function createData()
    {
        return $this->manager
            ->createData(
                new Item($this->parseContents($this->responseContents), $this->fractal)
            )
            ->toArray();
    }

    protected function parseContents($responseContents)
    {
        return json_decode($responseContents);
    }
}
