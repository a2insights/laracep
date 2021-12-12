<?php

namespace CepRepository\Contracts;

/**
 * Interface ClientContract
 * @package CepRepository\Contracts
 */
interface ClientContract
{
    /**
     * @param array $headers
     * @return mixed
     */
    public function setHeaders(array $headers);

    /**
     * @param $body
     * @return string
     */
    public function setBody(string $body);

    /**
     * @param array $params
     * @return mixed
     */
    public function setParams(array $params);

    /**
     * @param array $query
     * @return mixed
     */
    public function setQuery(array $query);

    /**
     * @param string $cep
     * @return mixed
     */
    public function setCep(string $cep);

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @return string
     */
    public function getBody();

    /**
     * @return string
     */
    public function getUri();

    /**
     * @return array
     */
    public function getParams();

    /**
     * @return array
     */
    public function getQuery();

    /**
     * @return mixed
     */
    public function request();
}
