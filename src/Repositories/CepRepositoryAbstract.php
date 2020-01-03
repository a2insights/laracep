<?php


namespace Atiladanvi\CepRepository\Repositories;

use Atiladanvi\CepRepository\Contracts\CepRepositoryContract;
use GuzzleHttp\Exception\BadResponseException;

class CepRepositoryAbstract implements CepRepositoryContract
{

    protected $client;

    /**
     * CepRepositoryAbstract constructor.
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = app($client);
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

        return json_decode($result);
    }
}
