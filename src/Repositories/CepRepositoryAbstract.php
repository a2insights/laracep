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

    public function __construct($client, $fractal)
    {
        $this->client = app($client);
        $this->fractal = app($fractal);
        $this->manager =  new Manager();
    }

    public function get(string $cep)
    {
        try{
            $result = $this->client
                ->setCep($cep)
                ->request()
                ->getBody()
                ->getContents();
        }catch (BadResponseException $ex) {
            return null;
        }

        return $this->serialize($result);
    }

    protected function serialize($result)
    {
        $this->manager->setSerializer(app(ArraySerializer::class));

        $address = new Item(json_decode($result), $this->fractal);

        return $this->manager->createData($address)->toArray();
    }
}
