<?php

namespace TM\TimeConversion;

use TM\TimeConversion\Exception\UnitException;

class Time
{
    /**
     * @var float
     */
    private $amount;

    /**
     * @var string|Unit
     */
    private $unit;

    /**
     * @param float       $amount
     * @param string|Unit $unit
     */
    public function __construct($amount, $unit)
    {
        if (!$unit instanceof Unit && !is_string($unit)) {
            throw new UnitException;
        }

        if (is_string($unit)) {
            $unit = new Unit($unit);
        }

        $this->amount = floatval($amount);
        $this->unit   = $unit;
    }

    /**
     * @param mixed       $value
     * @param string|Unit $unit
     *
     * @return Time
     */
    public static function fromValue($value, $unit)
    {
        if (!$unit instanceof Unit && !is_string($unit)) {
            throw new UnitException;
        }

        if (is_string($unit)) {
            $unit = new Unit($unit);
        }

        return new static(floatval($value), $unit);
    }

    /**
     * Returns a new Time object that represents the amount value of this object
     * in the given unit.
     *
     * @param string|Unit $unit
     * @param int         $precision
     * @return Time
     */
    public function convert($unit, $precision = 2)
    {
        if (!$unit instanceof Unit && !is_string($unit)) {
            throw new UnitException;
        }

        if (is_string($unit)) {
            $unit = new Unit($unit);
        }

        return $this->newTime(
            Conversion::convert($this->amount, $this->unit, $unit, $precision)
        );
    }

    /**
     * Returns a new Time object that represents the rounded amount value
     * of the sum of this object and another.
     *
     * @param Time $other
     * @return Time
     */
    public function add(Time $other)
    {
        $amount = $other->getAmount();

        if ($this->unit !== $other->getUnit()) {
            $amount = Conversion::convert($amount, $other->getUnit(), $this->unit);
        }

        return $this->newTime($this->amount + $amount);
    }

    /**
     * Returns a new Time object that represents the rounded amount value
     * of the difference of this object and another.
     *
     * @param Time $other
     * @return Time
     */
    public function subtract(Time $other)
    {
        $amount = $other->getAmount();

        if ($this->unit !== $other->getUnit()) {
            $amount = Conversion::convert($amount, $other->getUnit(), $this->unit);
        }

        return $this->newTime($this->amount - $amount);
    }

    /**
     * Returns a new Time object that represents the amount value
     * of this object multiplied by a given factor.
     *
     * @param float $factor
     * @return Time
     */
    public function multiply($factor)
    {
        return $this->newTime($factor * $this->amount);
    }

    /**
     * Returns true if the amount value represented by this time object
     * equals to another.
     *
     * @param Time $other
     * @return bool
     */
    public function equals(Time $other)
    {
        return $this->compareTo($other) === 0;
    }

    /**
     * Returns true if the amount value represented by this time object
     * is greater than that of another, false otherwise.
     *
     * @param Time $other
     * @return bool
     */
    public function greaterThan(Time $other)
    {
        return $this->compareTo($other) === 1;
    }

    /**
     * Returns true if the amount value represented by this time object
     * is greater than or equal that of another, false otherwise.
     *
     * @param Time $other
     * @return bool
     */
    public function greaterThanOrEqual(Time $other)
    {
        return $this->greaterThan($other) || $this->equals($other);
    }

    /**
     * Returns true if the amount value represented by this time object
     * is smaller than that of another, false otherwise.
     *
     * @param Time $other
     * @return bool
     */
    public function lessThan(Time $other)
    {
        return $this->compareTo($other) === -1;
    }

    /**
     * Returns true if the amount value represented by this time object
     * is smaller than or equal that of another, false otherwise.
     *
     * @param Time $other
     * @return bool
     */
    public function lessThanOrEqual(Time $other)
    {
        return $this->lessThan($other) || $this->equals($other);
    }

    /**
     * Returns the amount for this Time object.
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Returns the unit for this Time object.
     *
     * @return Unit
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->amount . $this->unit;
    }

    /**
     * @param Time $other
     *
     * @return int
     */
    private function compareTo(Time $other)
    {
        $amount = $other->getAmount();

        if ($this->unit !== $other->getUnit()) {
            $amount = Conversion::convert($amount, $other->getUnit(), $this->unit);
        }

        $difference = abs($amount - $this->getAmount());

        /**
         * @see http://php.net/manual/de/language.types.float.php#language.types.float.comparison
         */
        if (round($difference, 2) <= round(0.01, 2)) {
            return 0;
        }

        return $this->amount < $amount ? -1 : 1;
    }

    /**
     * @param float $amount
     *
     * @return static
     */
    private function newTime($amount)
    {
        return new static($amount, $this->unit);
    }
}
