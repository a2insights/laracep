<?php

namespace CepRepository\Clients;

class CORREIROSClient extends GuzzleClient
{
    protected $baseUri = 'https://apps.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente';

    protected $method = 'POST';

    public function getHeaders()
    {
        return [
            'Accept' => 'text/xml;charset=UTF-8',
            'Cache-control' => 'no-cache'
        ];
    }

    public function getUri()
    {
        return '';
    }

    public function getBody()
    {
        return "<?xml version=\"1.0\"?>
                    <soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:cli=\"http://cliente.bean.master.sigep.bsb.correios.com.br/\">
                        <soapenv:Header />
                        <soapenv:Body>
                            <cli:consultaCEP>
                            <cep>$this->cep</cep>
                            </cli:consultaCEP>
                        </soapenv:Body>
                    </soapenv:Envelope>";
    }
}
