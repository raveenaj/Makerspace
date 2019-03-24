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
if(isset($_POST['SID'])){
	$SID = $_POST['SID'];
	// $Name = $_POST['name'];
	// $Equipment = $_POST['equipment'];
    
    if(strlen($SID)==0)
    {
        echo 'Please Fill in the Student ID';
        exit(0);
    }
	 if(strlen($SID)!=10 || !(is_numeric($SID)))
    {
        echo 'ERROR! Cannot Delete : Check the Student ID!';
        exit(0);
    }

	$querycheck = "Select * FROM student WHERE SID= $SID" ;

	$resultcheck = mysqli_query($conn, $querycheck);
   	$rowcount=mysqli_num_rows($resultcheck);

    	if($rowcount==0)
    	{
    		echo 'ERROR ! Could not Delete. No student found !';
    	}

    	else{
    		$query = "DELETE FROM student WHERE SID= $SID" ;

	if(!mysqli_query($conn,$query))
	{
		echo 'ERROR ! Could not Delete. Remember to  Delete Student Accesses first!'; // error message
	}
	else{

		echo 'Record Deleted!'; // you have to print the table 
	
	}

    	}
	

}
	
	//header("refresh:0.01;url=newStudent.php");


?>
