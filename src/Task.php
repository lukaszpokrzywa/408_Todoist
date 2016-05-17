<?php

class Task {
	
	private $name;
	private $description;
	private $finished;
	private $priority;
	
	public function __construct($name, $description, $priority = 0) {
		$this->setName($name);
		$this->setDescription($description);
		$this->finished = false;
		$this->priority = (is_int($priority) && $priority >= -2 && $priority <= 2) ? $priority : 0;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setName($name) {
		$this->name = is_string($name) ? $name : 'unknown task';
	}
	
	public function getDescription() {
		return $this->description;
	}
	
	public function setDescription($description) {
		$this->description = is_string($description) ? $description: '';
	}
	
	public function show() {
		if($this->finished) {
			echo '<s>';
		}
		echo "<strong>{$this->name}</strong> priority: {$this->getPriority()}: {$this->description}<br />";
		if($this->finished) {
			echo '</s>';
		}
	}
	
	public function getFinished() {
		return $this->finished;
	}
	
	public function finishTask() {
		$this->finished = true;
	}
	
	public function getPriority() {
		return $this->priority;
	}
	
	public function setPriority($priority) {
		$this->priority = $priority;
	}
}