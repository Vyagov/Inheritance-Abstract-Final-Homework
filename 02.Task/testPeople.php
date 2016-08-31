<?php

use People\Person;
use People\Student;
use People\Employee;

require_once 'autoload.php';

$people = [
	new Person('Ivan', 31, true),
	new Person('Milena', 29, false),
	new Student('Maria', 20, false, 5.5),
	new Student('Gosho', 19, true, 5.25),
	new Employee('Tosho', 17, true, 21),
	new Employee('Pesho', 25, true, 43),
];

foreach ($people as $value) {
	if ($value instanceof Student) {
		echo $value->showStudentInfo(), PHP_EOL, PHP_EOL;
		continue;
	}
	
	if ($value instanceof Employee) {
		echo $value->showEmployeeInfo(), PHP_EOL;
		echo sprintf("Overtime: €%01.2f", 
				$value->calculateOvertime(2)
			), PHP_EOL, PHP_EOL;
		continue;
	}
	
	if ($value instanceof Person) {
		echo $value->showPersonInfo(), PHP_EOL, PHP_EOL;
	}
}