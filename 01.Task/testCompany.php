<?php

use Company\Employee;
use Company\Task;
use Company\AllWork;

require_once 'autoload.php';

$task1 = new Task("Task 1", 5);
$task2 = new Task("Task 2", 14);
$task3 = new Task("Task 3", 41);
$task4 = new Task("Task 4", 11);
$task5 = new Task("Task 5", 9);
$task6 = new Task("Task 6", 7);
$task7 = new Task("Task 7", 56);
$task8 = new Task("Task 8", 29);
$task9 = new Task("Task 9", 35);
$task10 = new Task("Task 10", 21);

$allWork = new AllWork();
$allWork->addTask($task1);
$allWork->addTask($task2);
$allWork->addTask($task3);
$allWork->addTask($task4);
$allWork->addTask($task5);
$allWork->addTask($task6);
$allWork->addTask($task7);
$allWork->addTask($task8);
$allWork->addTask($task9);
$allWork->addTask($task10);

$employee1 = new Employee("Ivan", $allWork);
$employee2 = new Employee("Niki", $allWork);
$employee3 = new Employee("Tina", $allWork);

$isWork1 = true;
$isWork2 = true;
$isWork3 = true;
$work = $employee1->getAllWork()->isAllWorkDone();

$days = 1;
while(true) {
	if (!$work && !$isWork1 && !$isWork2 && !$isWork3) {
		die("\nALL WORK IS DONE!!!");
	}
    echo "\nStart working day number $days\n",  PHP_EOL;
    $days++;
    $employee1->work();
    $employee2->work();
    $employee3->work();
    
    $isWork1 = $employee1->getCurrentTask()->getWorkingHours();
    $isWork2 = $employee2->getCurrentTask()->getWorkingHours();
    $isWork3 = $employee3->getCurrentTask()->getWorkingHours();
} 
