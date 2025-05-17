<?php

namespace App\Enums;

use App\Traits\EnumValues;

enum OrderStatus: int
{
    use EnumValues;

    case PENDING = 0;
    case PROCESSING = 1;
    case SHIPPED = 2;
    case DELIVERED = 3;
    case CANCELED = 4;

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::PROCESSING => 'Processing',
            self::SHIPPED => 'Shipped',
            self::DELIVERED => 'Delivered',
            self::CANCELED => 'Canceled',
        };
    }
}