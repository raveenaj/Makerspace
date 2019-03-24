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
if(isset($_POST['AID'])){
	$AID = $_POST['AID'];
	$Pass= $_POST['Pass'];
	$CPass= $_POST['CPass'];
	

	if(strlen($AID)==0 || strlen($Pass)==0 || strlen($CPass)==0)
	{
		echo 'Please Fill All the Fields';
        exit(0);
	}

	 if(strlen($AID)!=7) // check only last 4 digits as numeric
    {
        echo 'ERROR! Check the NetID!';
        exit(0);
    }

     if(!($Pass===$CPass)) // check only last 4 digits as numeric
    {
        echo 'Password and confirmation password do no match!';
        exit(0);
    }

    //also have to check if password and confirm password match

    $checkadmin = "SELECT * FROM Administrator WHERE  netid = '$AID' " ;

    $resultcheckadmin = mysqli_query($conn,$checkadmin);

    $rowcountadmin=mysqli_num_rows($resultcheckadmin);

    if($rowcountadmin!=0)
    { echo "Admin already exists!";
		exit(0);
    }

	else{
		
	$query = "INSERT INTO Administrator (netid,Password) VALUES ('$AID','$Pass')" ;
	
	

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

		echo 'Admin Added!';;
	
	}
	}

}//if asset ends here
	
	//header("refresh:0.01;url=machine.php");


?>