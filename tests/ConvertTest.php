<?php

namespace TM\TimeConversion\Tests;

use TM\TimeConversion\Time;
use TM\TimeConversion\Unit;

/**
 * Tests for converting one unit in another
 */
class ConvertTest extends \PHPUnit_Framework_TestCase
{
    public function testCanConvertInPicoseconds()
    {
        $oneSecond = Time::fromValue(1, 's');
        $picoseconds = $oneSecond->convert(Unit::PICOSECOND);

        $this->assertEquals(1000000000000, $picoseconds->getAmount());
    }

    public function testCanConvertInWeeks()
    {
        $oneYear = Time::fromValue(1, Unit::YEAR);
        $oneYearInWeeks = $oneYear->convert(Unit::WEEK);

        $this->assertEquals(52.18, $oneYearInWeeks->getAmount());
    }

    public function testCanConvertInYears()
    {
        $oneDecade = Time::fromValue(2.5, Unit::DECADE);
        $oneDecadeInYears = $oneDecade->convert(Unit::YEAR);

        $this->assertEquals(25.0, $oneDecadeInYears->getAmount());
    }

    public function testCanConvertInSeconds()
    {
        $twoAndHalfYear = Time::fromValue(2.5, Unit::YEAR);
        $twoAndHalfYearInSeconds = $twoAndHalfYear->convert(Unit::SECOND);

        $this->assertEquals(78892250, $twoAndHalfYearInSeconds->getAmount());
    }

    public function testCanConvertInWeeksWitherOtherPrecision()
    {
        $oneYear = Time::fromValue(1, Unit::YEAR);
        $oneYearInWeeks = $oneYear->convert(Unit::WEEK, 3);

        $this->assertEquals(52.177, $oneYearInWeeks->getAmount());
    }
}
