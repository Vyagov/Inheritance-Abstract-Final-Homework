<?php

namespace People;

class Student extends Person
{
	protected $score;
	
	public function __construct($name, $age, $isMale, $score)
	{
		parent::__construct($name, $age, $isMale);
		
		if (($score < 2 || $score > 6) || !is_numeric($score)) {
			return 'The score must be a number from 2 to 6!';
		}
		
		$this->score = $score;
	}
	
	public function showStudentInfo()
	{
		return sprintf("%s\nScore: %01.2f", 
				parent::showPersonInfo(),
				$this->score
			);
	}
}