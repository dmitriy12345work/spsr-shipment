<?php

namespace stp\spsr\type;

use stp\spsr\BaseType;

/**
 * @property string $Date Дата и время Формат ISO 8601 YYYY-MM-DDThh:mm:ss.sss
 * @property string $EventName Описание события См. файл “events.xlsx”
 * @property string $City Город, в котором находится отправление в момент текущего события. Строка
 * @property string $EventStrCode Буквенный код события См. файл “events.xlsx”
 * @property integer $EventNumCode Цифровой код события См. файл “events.xlsx”
 * @property integer $DeliveryNumCode Цифровой код квитанции См. файл “events.xlsx”
 * @property string $Cosignee Грузополучатель, имя.
 * @property string $ClientBarcode
 *
 * @todo Encloses
 */
class EventType extends BaseType
{
    // разные коды означающие что отправление доставлено
    const DELIVERED_CODES = ['_CLCDR', 'INDSS', 'IN3DL', 'INDLV'];
}
