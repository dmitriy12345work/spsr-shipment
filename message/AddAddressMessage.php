<?php

namespace stp\spsr\message;

use stp\spsr\response\AddAddressResponse;
use stp\spsr\response\AddOrder;
use SimpleXMLElement;


/**
 * @property string $ICN ИКН
 * @property string $Login логин
 * @property string $Address Адрес сбора Строка/100
 * @property string $FIO ФИО отправителя Строка/60
 * @property string $Organization Организация-отправитель Строка/100
 * @property string $Phone Телефон отправителя Строка/20
 * @property string $AddPhone Дополнительный телефон отправителя Строка/255
 * @property string $Additionally Дополнительная информация Строка/100
 * @property string $PostCode Почтовый индекс (только для РФ) Строка/6
 * @property string $City_ID идентификаторы города получателя
 * @property string $City_Owner_ID Идентификаторы города отправителя, уникальный ключ составляют ID и Owner_ID
 * @property integer $AddressType Тип адреса Целое положительное число (обычно 8, какие есть еще варианты?)
 */
class AddAddressMessage extends BaseXmlMessage
{
    public function getRoot()
    {
        return 'AddAddr';
    }

    /**
     * Return XML method string and version, e.g. DataEditManagment/AddAddress
     * @return string
     */
    public function getMethodString()
    {
        return 'DataEditManagment/AddAddress';
    }

    /**
     * Return XML method string and version, e.g. 1.0
     * @return string
     */
    public function getMethodVersion()
    {
        return '1.0';
    }

    /**
     * @return AddAddressResponse
     */
    public function buildResponse(SimpleXMLElement $response)
    {
        $root = $this->getRoot();
        /** @var AddAddressResponse $result */
        $result = self::xmlNode2Type($response->$root, AddAddressResponse::className());
        $result->setResponse($response);

        return $result;
    }

}
