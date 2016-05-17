<?php

require_once 'src/Task.php';
$tasks = array();

$tasks[] = new Task('task 1', 'task 1 description');
$tasks[] = new Task('task 2', 'task 2 description');
$tasks[] = new Task('task 3', 'task 3 description');

foreach($tasks as $task) {
	$task->show();
}