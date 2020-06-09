<?php

namespace Atiladanvi\CepRepository\Contracts;

/**
 * Interface ClientContract
 * @package Atiladanvi\CepRepository\Contracts
 */
interface ClientContract
{
    /**
     * @param array $headers
     * @return mixed
     */
    public function setHeaders(array $headers);

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
     * @return mixed
     */
    public function getUri();

    /**
     * @return mixed
     */
    public function request();
}
