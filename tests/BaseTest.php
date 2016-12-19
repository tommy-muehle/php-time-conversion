<?php

namespace TM\TimeConversion\Tests;

use TM\TimeConversion\Exception\UnitException;
use TM\TimeConversion\Exception\UnknownUnitException;
use TM\TimeConversion\Time;
use TM\TimeConversion\Unit;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetStringFromTime()
    {
        $oneDay = new Time(1, 'd');
        $this->assertEquals('1d', (string) $oneDay);
    }

    public function testUnknownUnitThrowsException()
    {
        $this->setExpectedException(UnknownUnitException::class);
        $unknownTime = Time::fromValue(1, 'foo');
    }

    public function testUnknownUnitInConversionThrowsException()
    {
        $this->setExpectedException(UnitException::class);

        $oneHour = Time::fromValue(1, Unit::DAY);
        $unknownUnit = $oneHour->convert(123);
    }

    public function testInvalidUnitThrowsException()
    {
        $this->setExpectedException(UnitException::class);
        $invalidTime = Time::fromValue(1, 123);
    }

    public function testInvalidUnitInConstructorThrowsException()
    {
        $this->setExpectedException(UnitException::class);
        $invalidTime = new Time(1, 123);
    }
}
