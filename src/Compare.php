<?php

require_once 'Task.php';

function taskCompare(Task $task1, Task $task2) {
	if($task1->getPriority() == $task2->getPriority()) {
		return 0;
	}
	
	if($task1->getPriority() < $task2->getPriority()) {
		return 1;
	} else {
		return -1;
	}
}