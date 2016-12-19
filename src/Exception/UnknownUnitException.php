<?php

namespace TM\TimeConversion\Exception;

class UnknownUnitException extends \InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct($message = 'Unit are unknown!', $code = null, $previous = null);
    }
}
