<?php

namespace stp\spsr\type;

use stp\spsr\BaseType;

/**
 * @property string|null $InvoiceNumber Номер накладной СПСР
 * @property string|null $GCInvoiceNumber Номер присвойки
 * @property string|null $BarCode ШК СПСР вложимого
 * @property string|null $GCBarCode Клиентский ШК вложимого
 * @property integer|null $Invoice_ID
 * @property integer|null $Invoice_Owner_ID
 */
class MonitoringInvoiceInfoType extends BaseType
{
    public function getSprsNodeName()
    {
        return 'Invoice';
    }
}