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
		echo 'Databse not selected';
	}
if(isset($_POST['ID'])){
	$ID = $_POST['ID'];
	// $Name = $_POST['name'];
	// $Equipment = $_POST['equipment'];

	$query = "DELETE FROM student WHERE ID= $ID" ;

	if(!mysqli_query($conn,$query))
	{
		echo 'Required';
	}
	else{

		echo 'Deleted';
	
	}

}
	
	header("refresh:0.01;url=newStudent.php");


?>