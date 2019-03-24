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
	$Name = $_POST['name'];
	$Equipment = $_POST['equipment'];

	$query = "INSERT INTO student (ID,Name,Equipment) VALUES ('$ID','$Name','$Equipment')" ;
	

	if(!mysqli_query($conn,$query))
	{
		echo 'Required';
	}
	else{
	$select_query = "SELECT * FROM employee ORDER BY ID ASC";
     $result = mysqli_query($conn, $select_query);
     $output .= '
      <table id=student_table>  
                    <<tr> 
      <br/> 
      <th>ID</th>
      <th>Student Name</th> 
      <th >Equipment</th>
      </tr>

     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["ID"] . '</td>  
                         <td>' . $row["Name"] . '</td> 
                         <td>' . $row["Equipment"] . '</td> 
                          
                    </tr>
      ';
     }
     $output .= '</table>';

		echo $output;
	
	}

}
	
	header("refresh:0.01;url=newStudent.php");


?>