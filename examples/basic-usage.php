<?php

require_once __DIR__ . '/../vendor/autoload.php';

use TM\TimeConversion\Time;
use TM\TimeConversion\Unit;

// with constant usage
$tenWeeks = Time::fromValue(10, Unit::WEEK);
$tenWeeksInDays = $tenWeeks->convert(Unit::DAY);
echo $tenWeeksInDays->getAmount(); // 70

// with symbol instead of constant usage
$tenWeeksInMonths = $tenWeeks->convert('mo');
echo $tenWeeksInMonths->getAmount(); // 2.3
