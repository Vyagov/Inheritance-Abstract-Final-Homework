<?php

namespace Company;

class Employee
{
	const MAX_WORK_HOURS = 8;
	const MIN_WORK_HOURS = 0;
	protected $name;
	protected $currentTask;
	protected $hoursLeft;
	protected $allWork;
	
	public function __construct($name, AllWork $allWork)
	{
		$this->name = (string)$name;
		$this->allWork = $allWork;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($value)
	{
		if ($value != '') {
			return $this->name = (string)$value;
		}
	}
	
	public function getCurrentTask()
	{
		return $this->currentTask;
	}
	
	public function setCurrentTask(Task $value)
	{
		$this->currentTask = $value;
		echo sprintf("Assigning task %s to %s\n",
			$this->currentTask->getName(), 
			$this->name
		);
		return $this->currentTask;
	}
	
	public function getHoursLeft()
	{
		return $this->hoursLeft;
	}
	
	public function setHoursLeft($value)
	{
		if (is_numeric($value) && $value >= 0) {
			return $this->hoursLeft = (int)$value;
		}
	}
	
	public function getAllWork() 
	{
		return $this->allWork;
	}
	
	public function setAllWork(AllWork $value)
	{
		return $this->allWork = $value;
	}
	
	public function startWorkingDay()
	{
		$this->setHoursLeft(self::MAX_WORK_HOURS);
	}
	
	public function work()
	{
		if ($this->allWork->isAllWorkDone() && $this->currentTask->getWorkingHours() == 0) {
			echo 'No more tasks!!!', PHP_EOL;
			return true;
		}
		
		if ($this->hoursLeft == 0) {
			$this->startWorkingDay();
		}
		
		if (!$this->getCurrentTask()) {
			$this->setCurrentTask($this->allWork->getNextTask());
		}
		
		if ($this->currentTask->getWorkingHours() >= $this->hoursLeft) {
			echo sprintf("%s is working on task %s for %d hours.\n",
				$this->name,
				$this->currentTask->getName(),
				$this->hoursLeft
			);
			
			$this->currentTask->setWorkingHours($this->currentTask->getWorkingHours() - $this->hoursLeft);
			$this->hoursLeft = self::MIN_WORK_HOURS;
		} else {
			echo sprintf("%s is working on task %s for %d hours.\n",
				$this->name,
				$this->currentTask->getName(),
				$this->currentTask->getWorkingHours()
			);
			
			$this->setHoursLeft($this->hoursLeft - $this->currentTask->getWorkingHours());
			$this->currentTask->setWorkingHours(self::MIN_WORK_HOURS);
			
			if (!$this->allWork->isAllWorkDone()) {
				$this->setCurrentTask($this->allWork->getNextTask());
			}
		}
		
	 	if ($this->hoursLeft > 0) {
            $this->work();
        }
	}
}