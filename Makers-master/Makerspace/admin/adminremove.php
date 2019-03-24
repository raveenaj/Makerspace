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
if(isset($_POST['AID'])){
	$AID = $_POST['AID'];
	// $Mname = $_POST['Mname'];
	// $location = $_POST['location'];

	if(strlen($AID)==0 )
	{
		echo 'Please Fill in the NetID';
        exit(0);
	}

	 if(strlen($AID)!=7)
    {
        echo 'ERROR! Check the NetID!';
        exit(0);
    }

    $checkadmin = "SELECT * FROM Administrator WHERE  netid = '$AID'  " ;

    $resultcheckadmin = mysqli_query($conn,$checkadmin);

    $rowcountadmin=mysqli_num_rows($resultcheckadmin);

    if($rowcountadmin==0)
    { echo "Admin does not exist!";
		exit(0);
    }


	else {
		$query = "DELETE FROM Administrator WHERE netid = '$AID' " ;
	

	if(!mysqli_query($conn,$query))
	{
		echo 'ERROR! Could Not Proccess Request! Please try again! ';
	}
	else{

		echo 'Admin Deleted !';
	
	}
	}

}
	
	//header("refresh:0.01;url=machine.php");


?>