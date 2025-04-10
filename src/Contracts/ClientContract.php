<?php

namespace A2insights\Laracep\Contracts;

interface ClientContract
{
    public function setHeaders(array $headers);

    public function setBody(array $body);
    public function setParams(array $params);
    public function setQuery(array $query);
    public function setUri(string $uri);
    public function getHeaders();
    public function getBody(): string|array;
    public function getUri();
    public function getParams();
    public function getQuery();
    public function request();
}
