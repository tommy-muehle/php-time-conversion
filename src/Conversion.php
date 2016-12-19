<?php

namespace TM\TimeConversion;

class Conversion
{
    /**
     * @var array
     */
    private static $conversionMap = [
        Unit::PICOSECOND  => 1e-12,
        Unit::NANOSECOND  => 1e-9,
        Unit::MICROSECOND => 1e-6,
        Unit::MILLISECOND => 0.001,
        Unit::SECOND      => 1,
        Unit::MINUTE      => 60,
        Unit::HOUR        => 3600,
        Unit::DAY         => 86400,
        Unit::WEEK        => 604800,
        Unit::MONTH       => 2.62974e6,
        Unit::YEAR        => 3.15569e7,
        Unit::DECADE      => 3.15569e8,
        Unit::CENTURY     => 3.15569e9,
        Unit::MILLENIUM   => 3.1556926e10,
    ];

    private function __construct()
    {
    }

    /**
     * @param float $amount
     * @param Unit  $fromUnit
     * @param Unit  $targetUnit
     * @param int   $precision
     *
     * @return float
     */
    public static function convert($amount, Unit $fromUnit, Unit $targetUnit, $precision = 2)
    {
        $from = static::$conversionMap[$fromUnit->getSymbol()];
        $to   = static::$conversionMap[$targetUnit->getSymbol()];

        return round(($from / $to) * $amount, $precision, PHP_ROUND_HALF_EVEN);
    }
}
