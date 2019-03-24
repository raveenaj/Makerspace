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
	$Mname = $_POST['Mname'];
	$location = $_POST['location'];

	$query = "INSERT INTO Machine (MID,Mname,Location) VALUES ('$MID','$Mname','$location')" ;
	

	if(!mysqli_query($conn,$query))
	{
		echo 'Required';
	}
	else{
	$select_query = "SELECT * FROM machine ORDER BY MID ASC";
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

		echo $output;
	
	}

}
	
	header("refresh:0.01;url=machine.php");


?>