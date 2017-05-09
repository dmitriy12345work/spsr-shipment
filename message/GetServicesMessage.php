<?php

namespace stp\spsr\message;

use SimpleXMLElement;
use stp\spsr\response\ServiceResponse;

/**
 * Class GetServicesMessage
 */
class GetServicesMessage extends BaseXmlMessage
{
    public function getRoot()
    {
        return 'GetServices';
    }

    public function isRequiredICN()
    {
        return false;
    }

    public function isRequiredLogin()
    {
        return false;
    }

    public function isRequiredLoginNode()
    {
        return true;
    }

    /**
     * Return XML method name e.g. DataEditManagment/CreateOrder
     * @return string
     */
    public function getMethodString()
    {
        return 'Info/Info';
    }

    protected function buildContentNode(SimpleXMLElement $xmlNode)
    {
        // Empty node
    }

    /**
     * @param SimpleXMLElement $response
     * @return ServiceResponse[]
     */
    public function buildResponse(SimpleXMLElement $response)
    {
        $result = [];

        if (! ($response->MainServices->Service instanceof \SimpleXMLElement)) {
            return $result;
        }

        foreach($response->MainServices->Service as $service) {
            $result[] = self::xmlNode2Type($service, ServiceResponse::className());
        }

        return $result;
    }
}
