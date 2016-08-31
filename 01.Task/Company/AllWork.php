<?php

namespace Company;

class AllWork
{
	protected $tasks;
	protected $freePlacesForTasks;
	protected $currentUnassignedTask;
	
	public function __construct() {
		$this->tasks = [];
		$this->freePlacesForTasks = 12;
		$this->currentUnassignedTask = 0;
	}
	
	public function addTask(Task $value)
	{
		if ($this->freePlacesForTasks > 0) {
			$this->tasks[] = $value;
			$this->freePlacesForTasks--;
			echo sprintf("%s has been added to the tasks!\n",
				$value->getName()
			);
		} else {
			echo "No free places for tasks!\n";
		}
	}
	
	public function getNextTask()
	{
		$nextTask = $this->tasks[$this->currentUnassignedTask];
		$this->currentUnassignedTask++;
		return $nextTask;
	}
	
	public function isAllWorkDone()
	{
		return $this->currentUnassignedTask >= count($this->tasks) ? true : false;
	}
}