<?php

namespace Atiladanvi\CepRepository\Repositories;

use Atiladanvi\CepRepository\Clients\CORREIROSClient;
use Atiladanvi\CepRepository\Fractals\CORREIOSFractal;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;
use SimpleXMLElement;

class CepCORREIROSRepository extends CepRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(CORREIROSClient::class, CORREIOSFractal::class);
    }

    protected function serialize($result)
    {
        $this->manager->setSerializer(app(ArraySerializer::class));
        $address = new Item(json_decode(json_encode($this->readXml($result))), $this->fractal);

        return $this->manager->createData($address)->toArray();
    }

    private function readXml($xml)
    {
        $xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
        $xml = new SimpleXMLElement(utf8_encode($xml));

        return $xml->xpath('//soapBody')[0]
            ->xpath('//ns2consultaCEPResponse')[0]
            ->xpath('//return')[0];
    }
}
