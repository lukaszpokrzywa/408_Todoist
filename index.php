<?php 
session_start();
require_once 'src/Compare.php';

if(!isset($_SESSION['tasks'])) {
	$_SESSION['tasks'] = array();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = isset($_POST['name']) ? trim($_POST['name']) : null;
	$description = isset($_POST['description']) ? trim($_POST['description']) : null;
	$priority = isset($_POST['priority']) ? (int)$_POST['priority'] : 0;
	
	if($name && strlen($name) > 0 && $description && strlen($description) > 0) {
		
	   	$_SESSION['tasks'][$name] = serialize(new Task($name, $description, $priority));
	} else {
		echo "Incorrect task's data";
	}
} elseif($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['finishTask'])) {
	if(isset($_SESSION['tasks'][$_GET['finishTask']])) {
		$taskToFinish = unserialize($_SESSION['tasks'][$_GET['finishTask']]);
		$taskToFinish->finishTask();
		$_SESSION['tasks'][$_GET['finishTask']] = serialize($taskToFinish);
	}
}

?>

<!DOCTYPE html>
<html lang="en">
	<?php include 'head.php';?>

	<body role="document">
	    <div class="container theme-showcase" role="main">
	    	<div class="page-header"><h1>Todoist</h1></div>
	    	
	    	<a href="add_task.php" class="btn btn-default">Add task</a>
	    	
	    	<table class="table table-striped tasks-list">
	    	<?php 
	    		$tasks = array();
	    		foreach($_SESSION['tasks'] as $task) {
	    			$tasks[] = unserialize($task);	
	    		}
	    		
	    		usort($tasks, 'taskCompare');
	    		
	    		foreach($tasks as $task) {
	    			echo '<tr><td>';
	    			$task->show();
	    			echo "</td><td><a href='index.php?finishTask={$task->getName()}' class='btn btn-info' role='button'>Finish</a></td></tr>";
	    		}
	    	?>
	    	</table>
	    </div>
	</body>
</html>