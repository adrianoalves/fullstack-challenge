<?php

namespace App\Concerns\Enum;
// a Trait for Enums
trait IteratesOverCases
{
    public static function values(): array
    {
        return \array_column(self::cases(), 'value');
    }

    public static function names(): array
    {
        return \array_column(self::cases(), 'name');
    }
}