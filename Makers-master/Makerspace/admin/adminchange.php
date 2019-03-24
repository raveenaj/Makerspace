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
if(isset($_POST['AAID'])){
	$AAID = $_POST['AAID'];
	$APass= $_POST['APass'];
	$CAID = $_POST['CAID'];
	$CPass= $_POST['CPass'];
	$CCPass= $_POST['CCPass'];
	

	if(strlen($AAID)==0 || strlen($APass)==0 || strlen($CAID)==0 || strlen($CPass)==0 || strlen($CCPass)==0 )
	{
		echo 'Please Fill All the Fields';
        exit(0);
	}

	 if(strlen($AAID)!=7) // check only last 4 digits as numeric
    {
        echo 'ERROR! Check the NetID of the Authrorized admin!';
        exit(0);
    }

     if(strlen($CAID)!=7) // check only last 4 digits as numeric
    {
        echo 'ERROR! Check the NetID of the admin who requires password change!';
        exit(0);
    }

     if(!($CPass===$CCPass)) // check only last 4 digits as numeric
    {
        echo 'Password and Confirmation Password of the requested change do no match!';
        exit(0);
    }
	
	$checkadminauthpass = "SELECT * FROM Administrator WHERE  netid = '$AAID' AND Password='$APass' " ;

   $checkadminauth = "SELECT * FROM Administrator WHERE  netid = '$AAID' " ;
   $checkadmin = "SELECT * FROM Administrator WHERE  netid = '$CAID' " ;
   $checkadminrepeatpass = "SELECT * FROM Administrator WHERE  netid = '$CAID' AND Password='$CPass' " ;

    $resultcheckadminauthpass = mysqli_query($conn,$checkadminauthpass);
	$resultcheckadminauth = mysqli_query($conn,$checkadminauth);
	 $resultcheckadminrepeatpass = mysqli_query($conn,$checkadminrepeatpass);

    $resultcheckadmin = mysqli_query($conn,$checkadmin);

  	$rowcountadminauthpass=mysqli_num_rows($resultcheckadminauthpass);
    $rowcountadmin=mysqli_num_rows($resultcheckadmin);
    $rowcountadminauth=mysqli_num_rows($resultcheckadminauth);
    $rowcountadminrepeatpass=mysqli_num_rows($resultcheckadminrepeatpass);

    if($rowcountadmin==0)
    { echo "Admin who requires password change does not exist!";
		exit(0);
    }

    if($rowcountadminauth==0)
    { echo "Authorized Admin does not exist!";
		exit(0);
    }

    if($rowcountadminauthpass==0)
    { echo "Authorized Admin's credentials do not match!";
		exit(0);
    }

    if($rowcountadminrepeatpass!=0)
    { echo "ERROR! The requested password change is same as the old Password!";
		exit(0);
    }

	else{
		
	$query = "UPDATE Administrator  SET netid = '$CAID', Password='$CPass' WHERE  netid = '$CAID' " ; // update query
	
	

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

		echo "Password change successful for {$CAID} by {$AAID} " ;
	
	}
	}

}//if asset ends here
	
	//header("refresh:0.01;url=machine.php");


?>