<?php

require_once __DIR__ . '/../vendor/autoload.php';

use TM\TimeConversion\Time;
use TM\TimeConversion\Unit;

$oneHour = Time::fromValue(1, Unit::HOUR);
$result = $oneHour->equals(Time::fromValue(3600, Unit::SECOND));

var_dump($result); // true

$oneDay = Time::fromValue(1, Unit::DAY);
$result = $oneDay->greaterThan($oneHour);

var_dump($result); // true
