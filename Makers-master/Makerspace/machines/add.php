<?php
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbName = "testing";
	$conn = mysqli_connect($dbServername,$dbUsername,'','testing');
	$output = '';

	if(!$conn){
		echo 'Not connected';
	}

	if(!mysqli_select_db($conn,'testing'))
	{
		echo 'Database not selected';
	}
if(isset($_POST['MID'])){
	$MID = $_POST['MID'];
	$Mname = $_POST['Mname'];
	$location = $_POST['location'];

	if(strlen($MID)==0 || strlen($Mname)==0  || strlen($location)==0   )
	{
		echo 'Please Fill All the Fields';
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

    if($rowcountmachine!=0)
    { echo "Machine already exists!";
		exit(0);
    }

	else{
		
	$query = "INSERT INTO Machine (MID,Mname,Location) VALUES ('$MID','$Mname','$location')" ;
	
	

	if(!mysqli_query($conn,$query))
	{
		echo 'ERROR! Could Not Proccess Request! Please try again';
	}
	else{
	$select_query = "SELECT * FROM Machine ORDER BY MID ASC";
     $result = mysqli_query($conn, $select_query);
     $output .= '
      <table id=machine_table>  
                    <<tr> 
      <br/> 
      <th>Machine ID</th>
      <th>Machine Name</th> 
      <th >Location</th>
      </tr>

     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["MID"] . '</td>  
                         <td>' . $row["Mname"] . '</td> 
                         <td>' . $row["Location"] . '</td> 
                          
                    </tr>
      ';
     }
     $output .= '</table>';

		echo 'Machine Added!';;
	
	}
	}

}//if asset ends here
	
	//header("refresh:0.01;url=machine.php");


?>