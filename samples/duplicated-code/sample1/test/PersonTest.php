<?php

include_once 'src/Person.php';

class PersonTest extends PHPUnit_Framework_TestCase {

	public function test_has_a_name(
	) {
		$aName = "A Name";
		$aPerson = new Person($aName);
		$this->assertEquals($aName, $aPerson->name());
	}

}

?>
