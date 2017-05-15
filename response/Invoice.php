<?php

namespace stp\spsr\response;

use stp\spsr\type\MessageType;

/**
 * @property string $GCNumber номер присвойки СПСР-Экспресс (номер заказа клиента, номер отправления клиента)
 * @property string $InvoiceNumber номер накладной СПСР-Экспресс
 * @property string|null $Barcodes
 * @property string|null $ClientBarcodes
 * @property MessageType $Message
 */
class Invoice extends BaseResponse
{

}