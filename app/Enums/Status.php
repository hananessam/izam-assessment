<?php

namespace App\Enums;

use App\Traits\EnumValues;

enum Status: int
{
    use EnumValues;

    case ACTIVE = 1;
    case INACTIVE = 0;

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
        };
    }
}