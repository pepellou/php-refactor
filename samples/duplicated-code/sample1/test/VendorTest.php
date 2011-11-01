<?php

include_once 'src/Vendor.php';

class VendorTest extends PHPUnit_Framework_TestCase {

	public function test_has_a_name(
	) {
		$aName = "A Name";
		$aVendor = new Vendor($aName);
		$this->assertEquals($aName, $aVendor->name());
	}

	public function test_has_an_age(
	) {
		$aVendor = new Vendor("A Name");
		$anAge = 25;
		list($year, $month, $day) = $this->today();
		$year -= $anAge;
 		$aVendor->setBirthday("$year/$month/$day");
		$this->assertEquals($anAge, $aVendor->age());
	}

	private function today(
	) {
		return array(date('Y'), date('m'), date('d'));
	}

}

?>
