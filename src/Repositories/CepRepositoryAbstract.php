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

    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $client;
    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $fractal;

    /**
     * @var Manager
     */
    protected $manager;

    /**
     * CepRepositoryAbstract constructor.
     * @param $client
     * @param $fractal
     */
    public function __construct($client, $fractal)
    {
        $this->client = app($client);
        $this->fractal = app($fractal);
        $this->manager =  new Manager();
    }

    /**
     * @param string $cep
     * @return mixed
     */
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

    /**
     * @param
     * @return array|Item
     */
    private function serialize($result)
    {
        $this->manager->setSerializer(app(ArraySerializer::class));

        $address = new Item(json_decode($result), $this->fractal);

        return $this->manager->createData($address)->toArray();

    }
}
