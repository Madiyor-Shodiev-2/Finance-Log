<?php 

namespace App\Actions;

class BalanseAction
{
    public static function absIfNegative(int|float $value): int|float
    {
        return $value < 0 ? abs($value) : $value;
    }
}