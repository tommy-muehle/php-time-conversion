<?php

namespace TM\TimeConversion\Tests;

use TM\TimeConversion\Time;
use TM\TimeConversion\Unit;

/**
 * Tests for math operations with different times.
 */
class OperateTest extends \PHPUnit_Framework_TestCase
{
    public function testCanAddTime()
    {
        $oneHour = Time::fromValue(1, Unit::HOUR);
        $twoHours = $oneHour->add(Time::fromValue(60, Unit::MINUTE));

        $this->assertEquals(2.0, $twoHours->getAmount());
    }

    public function testCanSubtractTime()
    {
        $sevenDays = Time::fromValue(7, Unit::DAY);
        $sixDays = $sevenDays->subtract(Time::fromValue(1, Unit::DAY));

        $this->assertEquals(6.0, $sixDays->getAmount());
    }

    public function testCanMultiplyTime()
    {
        $hundredYears = Time::fromValue(100, Unit::YEAR);

        $this->assertEquals(300.0, $hundredYears->multiply(3.0)->getAmount());
        $this->assertEquals(150.0, $hundredYears->multiply(1.5)->getAmount());
    }
}
