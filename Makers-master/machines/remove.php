<?php
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbName = "testing";
	$conn = mysqli_connect($dbServername,$dbUsername,'','testing');

	if(!$conn){
		echo 'Not connected';
	}

	if(!mysqli_select_db($conn,'testing'))
	{
		echo 'Database not selected';
	}
if(isset($_POST['MID'])){
	$MID = $_POST['MID'];
	// $Mname = $_POST['Mname'];
	// $location = $_POST['location'];

	$query = "DELETE FROM Machine WHERE MID= $MID" ;

	if(!mysqli_query($conn,$query))
	{
		echo 'Required';
	}
	else{

		echo 'Deleted';
	
	}

}
	
	header("refresh:0.01;url=machine.php");


?>