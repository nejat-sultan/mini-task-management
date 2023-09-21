<?php 

session_start();

	$host='localhost';
	$user='root';
	$pass='237132';
	$db='task';

	$conn=mysqli_connect($host,$user,$pass,$db);

	//$result=mysqli_query($conn,"select * from task ");


 	if($conn)
	{
	 if(isset($_GET['update']))
            {
            	$id=$_GET['update'];	
            }

        if(isset($_POST['edit']))
        {
        	$edit=$_POST['task'];
        	$editdue=$_POST['duedate'];
        	$prior=$_POST['priority'];
        	$status=$_POST['status'];


        	$query="update task set task='$edit',duedate='$editdue',priority='$prior',status='$status' where id=$id";
        	if(!mysqli_query($conn,$query))
	            {
	                 echo '<script type="text/javascript">';
				     echo 'alert("Task not Updated!")';
				     echo '</script>';
	            }
	            else {

	            	header("Location:index.php");
	            }
        }


   }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title> edit tasks </title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">



</head>
<body>

	<div id="container"> <br>

		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand"  href="#"><h1> Task Management system <h1></a>
		    </div> 
		    
		  </div>
		</nav>
		

		<br><br>
		<div class="frm">

			<div id="title" style="width: 45%;"> <h3> Edit tasks </h3> </div> <br>	
			<form class="f"  method="post" action="#">
				<?php

					$sql =mysqli_query($conn,"select * from task where id=$id");
					$res =mysqli_fetch_array($sql);
				?>

				<label for="task"> Task: </label> &nbsp;
				<input type="text" name="task" id="tasks" value="<?php echo $res['task']; ?>"> <br> <br>

				<label for="duedate"> Due Date: </label> &nbsp;
				<input type="date" name="duedate" id="due" value="<?php echo $res['duedate']; ?>"> <br> <br>

				<label for="priority"> Priority: </label> &nbsp;
							<select id="tasks" name="priority">
								<option value="most important"> <?php echo $res['priority']; ?> </option>
								 <option value="most important"> most important </option>
								 <option value="important"> important </option>
								 <option value="least important"> least important </option>
							</select> <br> <br>

				<label for="status"> Status: </label> &nbsp;
					<select id="tasks" name="status">
							 
							 <option value="pending"> <?php echo $res['status']; ?>  </option>
							 <option value="pending"> pending </option>
							 <option value="completed"> completed </option>
							 <option value="cancelled"> cancelled </option>
					</select>
				<br><br><br><br>
				<input style="margin-left: 30%;" type="submit" class="btn btn-primary" name="edit" value="Update Task">
				<a style="margin-right: 30%;" class="btn btn-danger" href="index.php"> Back </a>
			</form>
		</div>
</div>
</body>
</html>