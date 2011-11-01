<?php

include_once 'src/Number.php';

class NumberTest extends PHPUnit_Framework_TestCase {

	public function test_can_create() {
		$this->assertEquals("123", Number::_new(123)->toString());
		$this->assertEquals("1254", Number::_new(1254)->toString());
		$this->assertEquals("10", Number::_new(10)->toString());
		$this->assertEquals("0", Number::_new(0)->toString());
	}

	public function test_can_clone() {
		$num = new Number(123);
		$num2 = $num->_clone();
		$this->assertFalse($num == $num2);
		$this->assertEquals($num->toString(), $num2->toString());
	}

	public function test_can_sum() {
		$this->assertEquals("50", Number::_new(15)->sum(new Number(35))->toString());
	}

	public function test_can_multiply() {
		$this->assertEquals("525", Number::_new(15)->multiply(new Number(35))->toString());
	}

	public function test_can_power() {
		$this->assertEquals("225", Number::_new(15)->power(2)->toString());
		$this->assertEquals("625", Number::_new(5)->power(4)->toString());
	}
}

?>
