<?php

namespace TM\TimeConversion\Exception;

class UnitException extends \InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct($message = 'Unit must be an object or string!', $code = null, $previous = null);
    }
}
