<?php

require_once 'src/Person.php';

class Customer extends Person {

	var $birthday;

	public function age(
	) {
		$now = date('Y');
		$birth = date('Y', $this->birthday());
		return $now - $birth;
	}

	public function setBirthday(
		$birthday
	) {
		$this->birthday = strtotime($birthday);
	}

	public function birthday(
	) {
		return $this->birthday;
	}

}

?>
