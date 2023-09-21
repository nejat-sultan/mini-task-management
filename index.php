<?php
 ob_start(); 

	$host='localhost';
	$user='root';
	$pass='237132';
	$db='task';

	$conn=mysqli_connect($host,$user,$pass,$db);
		
        	$status='pending';
        	$date=date('Y/m/d');
        	$res=mysqli_query($conn,"select * from task where duedate>='$date' and status='$status' ORDER BY `duedate` ASC ");

?>




<div class="container">
	<div class="modal fade" id="myMod" role="dialog">
	    <div class="modal-dialog">
	    	<div class="modal-content">
       		    <div class="modal-header">
         			 <button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>
       	    <div class="modal-body">
          		<div id="title"> <h3> Add Task </h3> </div> 

					<form method="post" action="#">
						<label for="task"> Task: </label> &nbsp;
						<input type="text" name="task" id="tasks"> <br> <br>
						
						<label for="duedate"> Due Date: </label> &nbsp;
						<input type="date" name="duedate" id="due"> <br> <br>

						<label for="priority"> Priority: </label> &nbsp;
					
							
							<select id="tasks" name="priority">
								<option selected disabled> select priority </option>
								 <option value="most important"> most important </option>
								 <option value="important"> important </option>
								 <option value="least important"> least important </option>
							</select> <br> <br>  

					</select> <br> <br>
						<input style="margin-left: 40%;" type="submit" class="btn btn-primary" name="Add" value="Add Task" placeholder="Type a task here..."> &nbsp;
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</form>
				</div>
        	<div class="modal-footer">
         	   
        	</div>
      		</div>
      
    	</div>
  </div>
</div>

	<?php

          	$result=mysqli_query($conn,"select * from task ORDER BY `id` ASC ");

				if($conn)
				{
					if(isset($_POST['Add']))
					{
						$task=$_POST['task'];
						$date=date('Y/m/d');
						$duedate=$_POST['duedate'];
						$priority=$_POST['priority'];
						$status='pending';

						if (empty($task))
						 {
							echo '<script type="text/javascript">';
				            echo 'alert("you must fill in the blank space!")';
				            echo '</script>'; 
						 }

						else
						 {
						 	
							$query = "INSERT INTO task(task,dateAdded,duedate,priority,status) VALUES ('$task','$date','$duedate','$priority','$status')";
								if(!mysqli_query($conn,$query))
						            {
						            	echo '<script type="text/javascript">';
							            echo 'alert("Task not Created!")';
							            echo '</script>'; 
						                
						            }
						            else {

						            	header("Location:index.php");
						            }
						}
						
					}
				}
				
?>
			




<!DOCTYPE html>
<html>
<head>

	<title> view tasks </title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">


</head>
<body>


	<div id="contain">
				<div class="modal fade" id="myModal" role="dialog">
	    		<div class="modal-dialog">
	    			<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div id="title"> <h3> Today's task </h3> </div> <br>	

    <table id="tbltoday">
	 	<tr>
	 		<th><h3>Id</h3>  </th>
	 		<th><h3> Tasks</h3> </th>	
	 		
	 	</tr>

	 	<?php 
	 		while ($row=mysqli_fetch_array($res)) {
	 	?>	
	 			<tr>
	 				<td > <?php echo $row['id']; ?> </td> 
	 				<td > <?php echo $row['task']; ?> </td>
	 			</tr>

	 	<?php

	 		}
	 	 ?>
 	</table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>




	<div id="container"> <br>

		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand"  href="#"><h2> Task Management system <h2></a> 
		    </div> 
		    <ul class="nav navbar-nav">
		      <li><button style="margin-left: 35%;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myMod">Add Tasks</button></li>
		      <li><button style="margin-left: 70%;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">See Today's Task</button></li>
		    </ul>
		    
		    
		  </div>
		</nav>

		
	
		 
<div id="title"> <h2 style="font-family: cursive;"> To-Do List </h2> </div> <br>

	 <table id="tbl">
	 	<tr>
	 		<th> Id </th>
	 		<th> Tasks </th>
	 		<th> Date Added </th>
	 		<th> Due Date </th>
	 		<th> Priority </th>
	 		<th> Status </th> 
	 		<th> Action </th>
	 	</tr>

	 	<?php

	 	 
	 		while ($row=mysqli_fetch_array($result)) {
	 	?>	
	 			<tr>
	 				<td > <?php echo $row['id']; ?> </td> 
	 				<td > <?php echo $row['task']; ?> </td>
	 				<td > <?php echo $row['dateAdded']; ?> </td>
	 				<td > <?php echo $row['duedate']; ?> </td>
	 				<td > <?php echo $row['priority']; ?> </td>
	 				<td > <?php echo $row['status']; ?> </td>
	 				<td>
	 					<a style="color: green;" href="updateTask.php?update=<?php echo $row['id']; ?>"> <span class="glyphicon glyphicon-edit"> </span> </a> 
	 					 <a style="color: red;" href="index.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this task?')"> <span class="glyphicon glyphicon-trash"></span> </a>

	 				</td>
	 				
	 			</tr>

	 	<?php

	 		}
	 	 ?>
 </table>




 <?php 
 	if($conn)
	{
	 if(isset($_GET['delete']))
            {
            	$id=$_GET['delete'];

           		 $query = "delete from task where id=$id";
           			if(!mysqli_query($conn,$query))
			            {
			            	echo '<script type="text/javascript">';
				            echo 'alert("Task not Deleted!")';
				            echo '</script>'; 
						                 
			            }
			            else {
			            	header("Location:index.php");
			            }

            }

        }


        
 ?>

 <? ob_flush(); ?>

</div>
</body>
</html>
