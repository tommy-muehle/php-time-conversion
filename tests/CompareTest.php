<?php

namespace TM\TimeConversion\Tests;

use TM\TimeConversion\Time;
use TM\TimeConversion\Unit;

/**
 * Tests for comparing time with the same and different units
 */
class CompareTest extends \PHPUnit_Framework_TestCase
{
    public function testCanCompareWithEquals()
    {
        $oneDay = Time::fromValue(1, Unit::DAY);

        $this->assertFalse($oneDay->equals(Time::fromValue(2, Unit::DAY)));
        $this->assertTrue($oneDay->equals(Time::fromValue(24, Unit::HOUR)));
    }

    public function testCanCompareWithGreaterThan()
    {
        $oneWeek = Time::fromValue(1, Unit::WEEK);

        $this->assertTrue($oneWeek->greaterThan(Time::fromValue(1, Unit::DAY)));
        $this->assertFalse($oneWeek->greaterThan(Time::fromValue(1, Unit::YEAR)));
    }

    public function testCanCompareWithLessThan()
    {
        $oneYear = Time::fromValue(1, Unit::YEAR);

        $this->assertTrue($oneYear->lessThan(Time::fromValue(5, Unit::YEAR)));
        $this->assertFalse($oneYear->lessThan(Time::fromValue(60, Unit::SECOND)));
    }

    public function testCanCompareWithGreaterThanOrEquals()
    {
        $oneHour = Time::fromValue(1, Unit::HOUR);

        $this->assertTrue($oneHour->greaterThanOrEqual($oneHour));
        $this->assertTrue($oneHour->greaterThanOrEqual(Time::fromValue(59, Unit::MINUTE)));
        $this->assertFalse($oneHour->greaterThanOrEqual(Time::fromValue(2, Unit::HOUR)));
    }

    public function testCanCompareWithLessThanOrEquals()
    {
        $oneHour = Time::fromValue(1, Unit::HOUR);

        $this->assertTrue($oneHour->lessThanOrEqual($oneHour));
        $this->assertTrue($oneHour->lessThanOrEqual(Time::fromValue(61, Unit::MINUTE)));
        $this->assertFalse($oneHour->lessThanOrEqual(Time::fromValue(0.5, Unit::HOUR)));
    }
}
