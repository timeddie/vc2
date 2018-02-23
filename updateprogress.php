<?php
include('session.php');
// functions to both ADD & UPDATE an employees progress
// ADD PROGRESS FUNCTION

if(isset($_POST['addbtn']))
{
	addprogress();
}

function addprogress()
{
	include ('dbh.php');
	$monval = mysqli_real_escape_string($db,$_POST['monval']);
	$tueval = mysqli_real_escape_string($db,$_POST['tueval']);
	$wedval = mysqli_real_escape_string($db,$_POST['wedval']);
	$thuval = mysqli_real_escape_string($db,$_POST['thuval']);
	$frival = mysqli_real_escape_string($db,$_POST['frival']);
	$empid = mysqli_real_escape_string($db,$_POST['empid']);

	$sql = "INSERT INTO prodata (monval, tueval, wedval, thuval, frival, empid) VALUES ('$monval', '$tueval', '$wedval', '$thuval', '$frival', '$empid')";

	//DID IT WORK? ERROR HANDLERS
	if ($db->query($sql) === TRUE) {
    header("Location: ../admin/writesuccess2.php");
	} else {
    header("Location: ../admin/writefail.php");
	}
}

// END OF ADD PROGRESS FUNCTION
// START OF UPDATE PROGRESS FUNCTION

if(isset($_POST['updatebtn']))
{
	updateprogress();
}

function updateprogress()
{
	include ('dbh.php');
	$monval = mysqli_real_escape_string($db,$_POST['monval']);
	$tueval = mysqli_real_escape_string($db,$_POST['tueval']);
	$wedval = mysqli_real_escape_string($db,$_POST['wedval']);
	$thuval = mysqli_real_escape_string($db,$_POST['thuval']);
	$frival = mysqli_real_escape_string($db,$_POST['frival']);
	$empid = mysqli_real_escape_string($db,$_POST['empid']);

	$sql = "UPDATE prodata 
			SET monval = '$monval', tueval = '$tueval', wedval ='$wedval', thuval = '$thuval', frival = '$frival' 
			 WHERE empid = '$empid'";


	// END OF UPDATE PROGRESS FUNCTION
	//DID IT WORK? ERROR HANDLERS
	if ($db->query($sql) === TRUE) {
    header("Location: ../admin/writesuccess2.php");
	} else {
    header("Location: ../admin/writefail.php");
	}
}

?>