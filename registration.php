<?php

include('session.php');


if (isset($_POST['registerbtn'])) {
	register();
}


function register(){

	include( 'dbh.php');
	// store values from from into variables 
	$first = mysqli_real_escape_string($db,$_POST['first']);
	$last = mysqli_real_escape_string($db,$_POST['last']);
	$age = mysqli_real_escape_string($db,$_POST['age']);
	$sex = mysqli_real_escape_string($db,$_POST['sex']);
	$eaddress = mysqli_real_escape_string($db,$_POST['eaddress']);
	$phonenumber = mysqli_real_escape_string($db,$_POST['phonenumber']);
	$nino = mysqli_real_escape_string($db,$_POST['nino']);
	$dept = mysqli_real_escape_string($db,$_POST['dept']);
	$login = mysqli_real_escape_string($db,$_POST['login']);
    $pass = mysqli_real_escape_string($db,$_POST['pass']); 
	$level = mysqli_real_escape_string($db,$_POST['level']);

	//QUERY TIME
	$sql = "INSERT INTO users (empfirst, emplast, empage, empsex, empeaddress, empphone, empnino, empdept, emplogin, emppass, level) VALUES ('$first', '$last', '$age', '$sex', '$eaddress', '$phonenumber', '$nino', '$dept', '$login', '$pass', '$level' )";


	//DID IT WORK? ERROR HANDLERS
	if ($db->query($sql) === TRUE) {
    header("Location: ../admin/writesuccess.php");
	} else {
    header("Location: ../admin/writefail.php");
	}

} 
///// END OF WRITE RECORD FEATURE
?>


