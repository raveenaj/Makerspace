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
if(isset($_POST['SID'])){
	$SID = $_POST['SID'];
    // echo strlen($SID);
	$Firstname = $_POST['Firstname'];
	$Lastname = $_POST['Lastname'];
    
    if(strlen($SID)!=10 || !(is_numeric($SID)))
    {
        echo 'ERROR! Check the Student ID!';
        exit(0);
    }
    
   
    $querycheck = "Select * FROM student WHERE SID= $SID" ;
    
    $resultcheck = mysqli_query($conn, $querycheck);
    $rowcount=mysqli_num_rows($resultcheck);
    
    if($rowcount==0)
    {
        
        $query = "INSERT INTO student (SID,Firstname,Lastname) VALUES ('$SID','$Firstname','$Lastname')" ;
        
        
        if(!mysqli_query($conn,$query))
        {
            echo 'There was an error processing your request, check your responses and please try again !';
            
        }
        else{
            $select_query = "SELECT * FROM student ORDER BY SID ASC";
            $result = mysqli_query($conn, $select_query);
            $output .= '
            <table id=student_table>
            <tr>
            <br/>
            <th>SID</th>
            <th>Firstname</th>
            <th >Lastname</th>
            </tr>
            
            ';
            while($row = mysqli_fetch_array($result))
            {
                $output .= '
                <tr>
                <td>' . $row["SID"] . '</td>
                <td>' . $row["Firstname"] . '</td>
                <td>' . $row["Lastname"] . '</td>
                
                </tr>
                ';
            }
            $output .= '</table>';
            
            echo 'Data Inserted!';
        }

        
    }
    
    else{
        echo 'Student already exists !';
    }



}
	
	//header("Refresh:0");


?>
