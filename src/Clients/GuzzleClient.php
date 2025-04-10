<?php

namespace A2insights\Laracep\Clients;

use A2insights\Laracep\Contracts\ClientContract;
use GuzzleHttp\Client as Client;

abstract class GuzzleClient implements ClientContract
{
    protected string $baseUri;

    protected Client $client;

    protected array $body = [];

    protected array $params = [];

    protected array $query = [];

    protected string $uri;

    protected array $headers = [];

    protected string $method = 'GET';

    public function __construct()
    {
        $this->client = new Client(['base_uri' => $this->baseUri]);

        return $this;
    }

    public function setHeaders(array $headers): GuzzleClient
    {
        $this->headers = array_merge($headers, [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ]);

        return $this;
    }

    public function setParams(array $params): GuzzleClient
    {
        $this->params = $params;

        return $this;
    }

    public function setBody(array $body): GuzzleClient
    {
        $this->body = $body;

        return $this;
    }

    public function setQuery(array $query): GuzzleClient
    {
        $this->query = $query;

        return $this;
    }

    public function setUri(string $uri): GuzzleClient
    {
        $this->uri = $uri;

        return $this;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function getBody(): string|array
    {
        return $this->body;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function getQuery(): array
    {
        return $this->query;
    }

    public function request()
    {
        return $this->client->request($this->method, $this->getUri(),
            collect([
                'headers' => $this->getHeaders(),
                'form_params' => $this->getParams(),
                'body' => $this->getBody(),
                'query' => $this->getQuery()
            ])->filter(function ($option) {
                return $option;
            })->toArray()
        );
    }
}
