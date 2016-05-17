<!DOCTYPE html>
<html lang="en">
<?php include 'head.php';?>

	<body role="document">
	
	    <div class="container theme-showcase" role="main">
			<div class="page-header"><h1>Add Task</h1></div>
			
			
			<form class="form-horizontal" role="form" method="POST" action="index.php">
				<div class="form-group">
			    	<label class="control-label col-sm-2" for="name">Name:</label>
			    	<div class="col-sm-10">
			      		<input type="text" required class="form-control" id="name" name="name" value="<?php echo isset($_POST['name'])?$_POST['name']:'' ?>" placeholder="Enter name">
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label class="control-label col-sm-2" for="description">Description:</label>
			    	<div class="col-sm-10">
			      		<textarea required class="form-control" id="description" name="description" placeholder="Enter description"><?php echo isset($_POST['description'])?$_POST['description']:'' ?></textarea>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label class="control-label col-sm-2" for="priority">Priority:</label>
			    	<div class="col-sm-10">
						<select name="priority" id="priority" class="form-control">
							<option value="-2">Very low</option>
							<option value="-1">Low</option>
							<option value="0">Normal</option>
							<option value="1">High</option>
							<option value="2">Very high</option>
						</select>	      		
			    	</div>
			  	</div>
			 
			  	<div class="form-group">
			  		<div class="col-sm-offset-2 col-sm-10">
			      		<button type="submit" class="btn btn-default">Add</button>
			    	</div>
			  	</div>
			</form>
		</div>
	</body>
</html>