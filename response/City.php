<?php

namespace stp\spsr\response;

/**
 * Описание города в ответе на список городов
 *
 * @property int $City_ID идентификаторы города
 * @property int $City_owner_ID идентификаторы города
 * @property string $CityName Электрогорск
 * @property string $RegionName Московская обл.
 * @property int $Region_ID идентификаторы региона
 * @property int $Region_Owner_ID идентификаторы региона
 * @property int $Country_ID идентификаторы города
 * @property int $Country_Owner_ID идентификаторы города
 * @property int $COD 1/0 Возможность использования в городе услуги «Оплата товара в момент вручения»
 * @property int $DepId Служебная информация
 * @property int $DepOwnerId Служебная информация
 */
class City extends BaseResponse
{

}
