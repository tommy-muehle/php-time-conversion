# php-time-conversion

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205.6-8892BF.svg?style=flat-square)](https://php.net/)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/tommy-muehle/php-time-conversion/master/LICENSE)
[![GitHub issues](https://img.shields.io/github/issues/tommy-muehle/php-time-conversion.svg)](https://github.com/php-time-conversion/issues)

Convert, compare and operate with time in different unit's.

## Features

* [Conversion between different time unit's](examples/basic-usage.php)
* [Support for comparing different time unit's like equals or greaterThan](examples/compare-usage.php)
* [Support for math operations like add and subtract](examples/math-usage.php)

## Example

```
use TM\TimeConversion\Time;
use TM\TimeConversion\Unit;

// convert
$tenWeeks = Time::fromValue(10.0, Unit::WEEK);
$tenWeeksInDays = $tenWeeks->convert(Unit::DAY);

echo $tenWeeksInDays->getAmount(); // 70

// compare
var_dump($tenWeeks->equals($tenWeeksInDays)); // true

// subtract
echo $tenWeekInDays->subtract(Time::fromValue(10, Unit::DAY)); // 60
```

For more and advanced examples look into the [examples directory](examples).

## Requirements

* PHP >= 5.6
* Composer

## Install

```
composer require tm/time-conversion ^1.0
```

## Contributing

Please refer to [CONTRIBUTING.md](CONTRIBUTING.md) for information on how to contribute.
