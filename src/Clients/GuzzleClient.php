<?php

namespace Atiladanvi\CepRepository\Clients;

use Atiladanvi\CepRepository\Contracts\ClientContract;
use GuzzleHttp\Client as Client;

/**
 * Class GuzzleClient
 * @package Atiladanvi\CepRepository\Clients
 */
abstract class GuzzleClient implements ClientContract
{
    /**
     * Base uri
     *
     * @var string
     */
    protected $baseUri;

    /**
     * Guzzle client
     *
     * @var Client
     */
    public $client;

    /**
     * Cep
     *
     * @var string
     */
    public $cep;

    /**
     * Form params
     *
     * @var array
     */
    private $params = [];

    /**
     * Query
     *
     * @var array
     */
    private $query = [];

    /**
     * Header of request
     *
     * @var array
     */
    private $headers = [];

    /**
     * GuzzleClient constructor.
     */
    public function __construct()
    {

        $this->client = new Client(
            [
                'base_uri' => $this->baseUri
            ]
        );

        return $this;
    }

    /**
     * @param string $cep
     * @return GuzzleClient
     */
    public function setCep(string $cep) : GuzzleClient
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Set headers
     *
     * @param  $headers
     * @return GuzzleClient
     */
    public function setHeaders(array $headers) : GuzzleClient
    {
        $this->headers = array_merge($headers,
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ]
        );

        return $this;
    }

    /**
     * Set params
     *
     * @param $params
     * @return $this
     */
    public function setParams(array $params) : GuzzleClient
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Set query
     *
     * @param array $query
     * @return GuzzleClient
     */
    public function setQuery(array $query) : GuzzleClient
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Get uri
     *
     * @return string
     */
    public function getUri()
    {
        return $this->cep;
    }

    /**
     * Request
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request()
    {
        return $this->client->request('GET' , $this->getUri(),
            [
                'headers' =>  $this->headers,
                'form_params' => $this->params,
                'query' => $this->query
            ]
        );
    }
}
