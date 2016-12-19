<?php

require_once __DIR__ . '/../vendor/autoload.php';

use TM\TimeConversion\Time;
use TM\TimeConversion\Unit;

// add same unit
$tenDays = Time::fromValue(10, Unit::DAY);
$twentyDays = $tenDays->add($tenDays);
echo $twentyDays->getAmount(); // 20

// add different unit
$coupleOfDays = $twentyDays->add(Time::fromValue(4, Unit::WEEK));
echo $coupleOfDays->getAmount(); // 48

// subtract
$lessDays = $coupleOfDays->subtract(Time::fromValue(2, Unit::WEEK));
echo $lessDays->getAmount(); // 34

// multiply
$threeTimesLessDays = $lessDays->multiply(3);
echo $threeTimesLessDays->getAmount(); // 102
