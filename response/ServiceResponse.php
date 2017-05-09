<?php

namespace stp\spsr\response;

/**
 * Описание города в ответе на список городов
 *
 * @property int $ID Числовой идентификатор вида сервиса
 * @property string $Name Название вида сервиса
 * @property string $ShortDescription Краткое описание вида сервиса
 * @property string $Description Полное описание вида сервиса
 *
 * Служебные поля:
 *
 * @property string $Mode
 * @property string $disabled
 * @property string $checked
 */
class ServiceResponse extends BaseResponse
{
}
