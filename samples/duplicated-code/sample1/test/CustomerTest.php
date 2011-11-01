<?php

include_once 'src/Customer.php';

class CustomerTest extends PHPUnit_Framework_TestCase {

	public function test_has_a_name(
	) {
		$aName = "A Name";
		$aCustomer = new Customer($aName);
		$this->assertEquals($aName, $aCustomer->name());
	}

	public function test_has_an_age(
	) {
		$aCustomer = new Customer("A Name");
		$anAge = 25;
		list($year, $month, $day) = $this->today();
		$year -= $anAge;
 		$aCustomer->setBirthday("$year/$month/$day");
		$this->assertEquals($anAge, $aCustomer->age());
	}

	private function today(
	) {
		return array(date('Y'), date('m'), date('d'));
	}

}

?>
