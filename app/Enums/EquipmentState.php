<?php

namespace App\Enums;

enum EquipmentState: string
{
    case NEW = 'new';
    case USED = 'used';
    case SPARE_PARTS = 'spare_parts';

    public static function getEquipmentStateTitle(EquipmentState $equipment_state)
    {
        return match ($equipment_state->value) {
            'new' => 'Новые',
            'used' => 'Б/У',
            'spare_parts' => 'По запчастям',
        };
    }
}
