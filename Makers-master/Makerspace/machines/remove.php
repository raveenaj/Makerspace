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

	if(strlen($MID)==0 )
	{
		echo 'Please Fill in the Machine ID';
        exit(0);
	}

	 if(strlen($MID)!=4 || !(is_numeric($MID)))
    {
        echo 'ERROR! Check the Machine ID!';
        exit(0);
    }

    $checkmachine = "SELECT * FROM Machine WHERE  MID = '$MID' " ;

    $resultcheckmachine = mysqli_query($conn,$checkmachine);

    $rowcountmachine=mysqli_num_rows($resultcheckmachine);

    if($rowcountmachine==0)
    { echo "Machine does not exist!";
		exit(0);
    }


	else {
		$query = "DELETE FROM Machine WHERE MID= $MID" ;
	

	if(!mysqli_query($conn,$query))
	{
		echo 'ERROR! Could Not Proccess Request! Please try again! Remember to delete all Acceses to Machine first';
	}
	else{

		echo 'Machine Deleted !';
	
	}
	}

}
	
	//header("refresh:0.01;url=machine.php");


?>