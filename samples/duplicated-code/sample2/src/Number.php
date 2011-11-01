<?php

class Number {

	private $_BASE = 10;
	private $values;

	private static $counter = 0;
	private $instance_id;

	public function __construct(
		$number
	) {
		$this->values = array();
		if ($number > 0) {
			while ($number > 0) {
				$this->values []= ($number % 10);
				$number = floor($number / 10);
			}
		}
		$this->instance_id = self::$counter++;
	}

	public function toString(
	) {
		if (count($this->values) == 0)
			return "0";
		$representation = "";
		foreach ($this->values as $value) {
			$representation = "$value$representation";
		}
		return $representation;
	}

	public function power(
		$exp
	) {
		$factor = $this->_clone();
		while ($exp-- > 1)
			$this->multiply($factor);
		return $this;
	}

	public function multiply(
		$other
	) {
		$num = $this->_clone();
		$this->values = array();
		for ($i = 0; $i < count($num->values); $i++) {
			for ($j = 0; $j < count($other->values); $j++) {
				$pos = $i + $j;
				while ($pos >= count($this->values))
					$this->values []= 0;
				$this->values[$pos] = $this->values[$pos] + $num->values[$i] * $other->values[$j];
			}
		}
		$index = 0;
		while ($index < count($this->values)) {
			if ($this->values[$index] >= $this->_BASE) {
				$acc = floor($this->values[$index] / $this->_BASE);
				$this->values[$index] = $this->values[$index] % $this->_BASE;
				if ($index + 1 < count($this->values))
					$this->values[$index + 1] = $this->values[$index + 1] + $acc;
				else
					$this->values []= $acc;
			}
			$index++;
		}
		return $this;
	}

	public function sum(
		$other
	) {
		while (count($other->values) > count($this->values))
			$this->values []= 0;
		while (count($this->values) > count($other->values))
			$other->values []= 0;
		for ($index = 0; $index < count($this->values); $index++) {
			$this->values[$index] = $this->values[$index] + $other->values[$index];
		}
		while ($this->values[count($this->values) - 1] == 0) {
			unset($this->values[count($this->values) - 1]);
		}
		$index = 0;
		while ($index < count($this->values)) {
			if ($this->values[$index] >= $this->_BASE) {
				$acc = floor($this->values[$index] / $this->_BASE);
				$this->values[$index] = $this->values[$index] % $this->_BASE;
				if ($index + 1 < count($this->values))
					$this->values[$index + 1] = $this->values[$index + 1] + $acc;
				else
					$this->values []= $acc;
			}
			$index++;
		}
		return $this;
	}

	public function _clone(
	) {
		$number = new Number(0);
		$number->values = $this->values;
		return $number;
	}

	public static function _new(
		$number
	) {
		return new Number($number);
	}

}

?>
