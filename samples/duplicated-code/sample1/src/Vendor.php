<?php

require_once 'src/Person.php';

class Vendor extends Person {

	var $birthday;

	public function age(
	) {
		return date('Y') - date('Y', $this->birthday());
	}

	public function setBirthday(
		$birthday
	) {
		$this->birthday = $birthday;
	}

	public function birthday(
	) {
		return strtotime($this->birthday);
	}

}

?>
