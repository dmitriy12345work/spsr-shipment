<?php

namespace stp\spsr\type;

use stp\spsr\BaseType;

/**
 * Есть еще неизвестные поля. Some unknown fields are exist, but not found in documentation
 *
 * @property string|null $ProductCode Код товара, присвоенный отправителем
 * @property string|null $Description Описание субвложимого
 * @property float $VATSum
 * @property float $VAT
 * @property float $Cost
 */
class SubPieceType extends BaseType
{
}
