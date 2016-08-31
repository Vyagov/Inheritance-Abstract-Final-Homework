<?php

namespace People;

class Person
{
	protected $name;
	protected $age;
	protected $isMale;
	
	public function __construct($name, $age, $isMale)
	{
		$this->name = (string)$name;
		$this->age = (int)$age;
		$this->isMale = (bool)$isMale;
	}
	
	public function showPersonInfo()
	{
		return sprintf("Name: %s\nAge: %s\nGender: %s",
				$this->name,
				$this->age,
				$this->isMale ? 'Male' : 'Female'
			);
	}
}