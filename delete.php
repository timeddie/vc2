<?php

		//including the database connection file
		include('dbh.php');
 
		//getting id of the data from url
		$id = $_GET['tid'];
 
		//deleting the row from table
		$sql = "DELETE FROM users WHERE empid=$id";
		$result = mysqli_query($db, $sql); 


		//reload the page
		header("Location:../admin/edit.php");

 
		