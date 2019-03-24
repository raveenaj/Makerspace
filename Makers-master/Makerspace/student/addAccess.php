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
if(isset($_POST['SID'])){
	$SID = $_POST['SID'];
	$MID = $_POST['MID'];

	if(strlen($SID)==0 || strlen($MID)==0 )
	{
		echo 'Please Fill All the Fields';
        exit(0);
	}

	  if(strlen($SID)!=10 || !(is_numeric($SID)) )
    {
        echo 'ERROR! Check the Student ID!';
        exit(0);
    }

      if(strlen($MID)!=4 || !(is_numeric($MID)))
    {
        echo 'ERROR! Check the Machine ID!';
        exit(0);
    }

	$checkstudent = "SELECT * FROM student WHERE SID = '$SID' " ;

	$checkmachine = "SELECT * FROM Machine WHERE  MID = '$MID' " ;

	$checkaccess = "SELECT * FROM access WHERE S_ID = '$SID' AND M_ID = '$MID' " ;

	$resultcheckstudent = mysqli_query($conn,$checkstudent);
	$resultcheckmachine = mysqli_query($conn,$checkmachine);
	$resultcheckaccess = mysqli_query($conn,$checkaccess);


	$rowcountstudent=mysqli_num_rows($resultcheckstudent);
	$rowcountmachine=mysqli_num_rows($resultcheckmachine);
	$rowcountaccess=mysqli_num_rows($resultcheckaccess);

	if($rowcountstudent==0)
    { echo "ERROR! Student Not Present In Database";
		exit(0);
    }

    elseif($rowcountmachine==0)
     { echo "ERROR! Machine Not Present In Database";
		exit(0);
     }

     elseif($rowcountaccess!=0)
     { echo "Access has already been granted!";
		exit(0);
    }

	else {
    	
    	$query = "INSERT INTO access(S_ID,M_ID) values ('$SID','$MID')";
    	if (!mysqli_query($conn,$query))
    	{
    		echo "Error Granting Access To Student ! Check response values! ";
    	}
    	else{
    		echo "Student Added To The Machine";
    	}
	}

	
	

	// if(!mysqli_query($conn,$query))
	// {
	// 	echo 'Required';
	// }
	// else{
	// $select_query = "SELECT * FROM student ORDER BY SID ASC";
 //     $result = mysqli_query($conn, $select_query);
 //     $output .= '
 //      <table id=student_table>  
 //                    <<tr> 
 //      <br/> 
 //      <th>SID</th>
 //      <th>Firstname</th> 
 //      <th >Lastname</th>
 //      </tr>

 //     ';
 //     while($row = mysqli_fetch_array($result))
 //     {
 //      $output .= '
 //       <tr>  
 //                         <td>' . $row["SID"] . '</td>  
 //                         <td>' . $row["Firstname"] . '</td> 
 //                         <td>' . $row["Lastname"] . '</td> 
                          
 //                    </tr>
 //      ';
 //     }
 //     $output .= '</table>';

	// 	echo $output;
	
	// }

}
	
	//header("refresh:5s;url=newStudent.php");


?>
