<?php

namespace stp\spsr\response;

use stp\spsr\type\EventType;

/**
 * Ответ на запрос по мониторингу доставки
 *
 * @property string|null $InvoiceNumber Номер накладной СПСР
 * @property string|null $GCInvoiceNumber Номер присвойки
 * @property string|null $BarCode ШК СПСР вложимого
 * @property string|null $GCBarCode Клиентский ШК вложимого
 * @property string|null $ErrorCode
 * @property string|null $ErrorMessage
 * @property string|null $ErrorMessageRU
 * @property string|null $ErrorMessageEn
 * @property integer $ID Идентификаторы накладной, уникальный ключ составляют ID и Owner_ID
 * @property integer $Owner_ID Идентификаторы накладной, уникальный ключ составляют ID и Owner_ID
 * @property integer $PaymentType Тип оплаты (для отправлений со статусом "Доставлено")
 * 0 - оплата наличными в момент получения, 1 - оплата картой в момент получения, 2 - предоплаченный заказ
 *
 * @property EventType[] $events|null лог событий отправления
 */
class MonitoringInvoiceInfo extends BaseResponse
{
    const PAYMENT_TYPE_CASH = 0;
    const PAYMENT_TYPE_CARD = 1;
    const PAYMENT_TYPE_PREPAID = 2;

    public function getEvents()
    {
        return $this->events;
    }
}
