<?php

include_once 'src/Number.php';

class NumberTest extends PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider create_data
	 */
	public function test_can_create(
		$expected,
		$number
	) {
		$this->assertEquals(
			$expected, 
			Number::_new($number)->toString()
		);
	}

	public function test_can_clone(
	) {
		$aNumber = new Number(123);
		$cloned = $aNumber->_clone();
		$this->assertFalse($aNumber == $cloned);
		$this->assertEquals($aNumber->toString(), $cloned->toString());
	}

	/**
	 * @dataProvider sum_data
	 */
	public function test_can_sum(
		$expected,
		$term1,
		$term2
	) {
		$this->assertEquals(
			$expected, 
			Number::_new($term1)->sum(new Number($term2))->toString()
		);
	}

	/**
	 * @dataProvider multiply_data
	 */
	public function test_can_multiply(
		$expected,
		$factor1,
		$factor2
	) {
		$this->assertEquals(
			$expected, 
			Number::_new($factor1)->multiply(new Number($factor2))->toString()
		);
	}

	/**
	 * @dataProvider power_data
	 */
	public function test_can_power(
		$expected,
		$base,
		$power
	) {
		$this->assertEquals(
			$expected, 
			Number::_new($base)->power($power)->toString()
		);
	}

	public function create_data(
	) {
		return array(
			"case 1" => array("123",  123),
			"case 2" => array("1254", 1254),
			"case 3" => array("10",   10),
			"case 4" => array("0",    0)
		);
	}

	public function sum_data(
	) {
		return array(
			"case 1" => array("50",  15,  35),
			"case 2" => array("576", 159, 417),
			"case 3" => array("320", 156, 164),
			"case 4" => array("42",  15,  27),
			"case 5" => array("27",  0,   27),
			"case 6" => array("27",  27,  0),
			"case 7" => array("0",   0,   0)
		);
	}

	public function multiply_data(
	) {
		return array(
			"case 1" => array("525", 15,   35),
			"case 2" => array("225", 15,   15),
			"case 3" => array("576", 48,   12),
			"case 4" => array("0",   1578, 0),
			"case 5" => array("0",   0,    2349),
			"case 6" => array("123", 123,  1),
			"case 7" => array("123", 1,    123)
		);
	}

	public function power_data(
	) {
		return array(
			"case 1" => array("225",     15,  2),
			"case 2" => array("625",     5,   4),
			"case 3" => array("1048576", 2,   20),
			"case 4" => array("1",       232, 0),
			"case 5" => array("0",       0,   12)
		);
	}

}

?>
