<?php

namespace stp\spsr\message;

use stp\spsr\response\DelAddressResponse;
use SimpleXMLElement;


/**
 * @property string $ICN ИКН
 * @property string $Login логин
 * @property integer $AddressType Тип адреса Целое положительное число (обычно 8, какие есть еще варианты?)
 * @property string $SborAddr_ID Идентификаторы адреса, уникальный ключ составляют ID и Owner_ID Из ответа на Создание адреса сбора или Просмотр адресов
 * @property string $SborAddr_Owner_ID Идентификаторы адреса, уникальный ключ составляют ID и Owner_ID Из ответа на Создание адреса сбора или Просмотр адресов
 */
class DelAddressMessage extends BaseXmlMessage
{
    public function getRoot()
    {
        return 'DelAddr';
    }

    /**
     * Return XML method string and version, e.g. DataEditManagment/AddAddress
     * @return string
     */
    public function getMethodString()
    {
        return 'DataEditManagment/DelAddress';
    }

    /**
     * @return \stp\spsr\response\DelAddressResponse
     */
    public function buildResponse(SimpleXMLElement $response)
    {
        $result = new DelAddressResponse();
        $result->setResponse($response);

        return $result;
    }

}
