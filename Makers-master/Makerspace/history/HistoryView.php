<?php  
 if(isset($_POST["tool_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "testing");  
      $query = "SELECT student.SID, student.Firstname,student.Lastname, History.Start, History.End FROM History, student WHERE History.mid = '".$_POST["tool_id"]."' AND History.sid=student.SID"  ;  
      $result = mysqli_query($connect, $query); 
      if (!$result) {
    printf("Error: %s\n", mysqli_error($connect));
    exit();
} 
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">
           <tr>  
                     <td width="25%"><label>User ID</label></td> 
                     <td width="25%"><label>Name</label></td>  
                     <td width="25%"><label>Start Time</label></td> 
                     <td width="25%"><label>End Time</label></td> 
                      
                     
                </tr> ';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                 
                <tr>  
                      
                     <td width="25%">'.$row["SID"].'</td>  
                     <td width="25%">'.$row["Firstname"].' '.$row["Lastname"].'</td> 
                     <td width="25%">'.$row["Start"].'</td> 


                     '; // notice output end 
                     
                      if ($row["End"]== '0000-00-00 00:00:00') {
                   $output .= ' <td width="25%">CURRENTLY IN USE</td> ';
                 			}
                 else {
                   $output .= ' <td width="25%">'.$row["End"].'</td> ';
                 		}
                  $output .= ' 
                </tr>  
                
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>