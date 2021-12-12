<?php

namespace CepRepository\Clients;

use CepRepository\Contracts\ClientContract;
use GuzzleHttp\Client as Client;

/**
 * Class GuzzleClient
 * @package ACepRepository\Clients
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
    protected $client;

    /**
     * Cep
     *
     * @var string
     */
    protected $cep;

    /**
     * Body
     *
     * @var string
     */
    protected $body;

    /**
     * Form params
     *
     * @var array
     */
    protected $params = [];

    /**
     * Query
     *
     * @var array
     */
    protected $query = [];

    /**
     * Header of request
     *
     * @var array
     */
    protected $headers = [];

    /**
     * Method of request
     *
     * @var array
     */
    protected $method = 'GET';

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
     * Set body
     *
     * @param string $body
     * @return $this
     */
    public function setBody($body) : GuzzleClient
    {
        $this->body = $body;

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
     * Get headers
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Get headers
     *
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Get params
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Get query
     *
     * @return array
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Request
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request()
    {
        return $this->client->request($this->method, $this->getUri(),
            collect([
                'headers' =>  $this->getHeaders(),
                'form_params' => $this->getParams(),
                'body' => $this->getBody(),
                'query' => $this->getQuery()
            ])->filter(function ($option) {
                return $option;
            })->toArray()
        );
    }
}
