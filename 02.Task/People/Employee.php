<?php

namespace People;

class Employee extends Person
{
	const DAY_WORK_HOURS = 8; 
	
	protected $daySalary;
	
	public function __construct($name, $age, $isMale, $daySalary)
	{
		parent::__construct($name, $age, $isMale);
		
		if (!is_numeric($daySalary)) {
			return 'Salary must be a number!';
		}
		
		$this->daySalary = $daySalary;
	}
	
	public function calculateOvertime($hours)
	{
		if ($this->age < 18) {
			$overtime = 0;
		} else {
			$overtime = $hours * ($this->daySalary / self::DAY_WORK_HOURS) * 1.5;
		}
		
		return $overtime;
	}
	
	public function showEmployeeInfo()
	{
		return sprintf("%s\nDay salary: €%01.2f",
				parent::showPersonInfo(),
				$this->daySalary
			);
	}
}