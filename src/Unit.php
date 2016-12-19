<?php

namespace TM\TimeConversion;

use TM\TimeConversion\Exception\UnknownUnitException;

class Unit
{
    const PICOSECOND  = 'ps';
    const NANOSECOND  = 'ns';
    const MICROSECOND = 'us';
    const MILLISECOND = 'ms';
    const SECOND      = 's';
    const MINUTE      = 'min';
    const HOUR        = 'hr';
    const DAY         = 'd';
    const WEEK        = 'wk';
    const MONTH       = 'mo';
    const YEAR        = 'a';
    const DECADE      = 'decade';
    const CENTURY     = 'century';
    const MILLENIUM   = 'ka';

    /**
     * @var string
     */
    private $symbol;

    /**
     * @param string $symbol
     */
    public function __construct($symbol)
    {
        if (!in_array($symbol, $this->getUnits())) {
            throw new UnknownUnitException;
        }

        $this->symbol = $symbol;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @return array
     */
    public function getUnits()
    {
        return (new \ReflectionClass($this))->getConstants();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->symbol;
    }
}
