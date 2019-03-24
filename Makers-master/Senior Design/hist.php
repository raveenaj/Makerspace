<!DOCTYPE html>
<html>

<meta charset="UTF-8">
<meta name="viewport" "content="width=device-width, "initial-scale=1"> <!--make the website work on all devices and screen res -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css"> <!--take care of all styling needs and browser differences -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="student.css"> <!--- link for design of website --->

<head>
  <style>

  .w3-btn {width:150px;}

  table#table2 {
    width:70%;
    margin-left:2%;
    margin-right:5%;
    /* margin-top:10%; */
  }



	</style>

</head>
<body>
  <!--- Code for the layout of the page, referencing student.css above in the scripts as well --->
  <header>
      <img src="https://www.uta.edu/_templates/_images/responsive/uta-logo-main.png" >
    </header>


  		 <div class="topnav">
    			<a href="#home">Home</a>
    			<a href="#student">Students</a>
    			<a href="#machine">Machines</a>
    			<a href="#History">History</a>
  		</div>


<!--- header &design for website ends here --->

<!--- table 1 ----->
<?php

//connect to SQLiteDatabase


$conn = mysqli_connect("localhost", "root", "Kimilkai88", "makerssquad");

if(!$conn) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}
#echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
#echo "Host information: " . mysqli_get_host_info($conn) . PHP_EOL;


$sql = "SELECT * FROM Tool";
$result = $conn->query($sql);
?>
<!-- table starts here -->
<div class ="container" style="overflow-y:auto;">
<table class = "w3-table-all w3-centered w3-hoverable">
  <thead>
    <tr class="w3-hover-orange">
      <th>ID</th>
      <th>Name</th>
      <th>Lab</th>
      <th>Expand</th>
    </tr>
  </thead>
  <tbody>
      <?php
        // output data of each row
        $no=0;
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["Tool_ID"]."</td>";
            $idArray=array($row["Tool_ID"]);
            echo "<td>".$row["Toolname"]."</td>";
            echo "<td> ".$row["lab"]."</td><td>";
            ?>
            <div class="w3-container">
              <p><button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black w3-round-xlarge"> Expand</button></p>
            </div>

            </td>

            <?php
            $no++;
            "</tr>";
        }?>


  </tbody>
</tbody>
</table>
</div>
<!--- table code ends here --->

<!-- Modal + table 2 starts here -->
<div id="id01" class="w3-modal w3-animate-opacity">
  <div class="w3-modal-content w3-card-4">
    <header class="w3-container w3-blue">
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
        <h4 class="modal-title"><center>Student Record</center></h4>
      </header>
      <div class="w3-container">
        <p>

          <?php
          $sql2 = "SELECT h.Timestamp, v.User_ID, u.Firstname FROM User u
                    LEFT JOIN History h ON u.User_ID=h.User_ID
                    LEFT JOIN Verify v ON v.User_ID=u.User_ID
                    WHERE h.TOOL_ID=1"; // hard coded the Tool_ID = 1, need to grab this unit from button in table 1

          $result2 = $conn->query($sql2) or die ($conn->error);
           ?>
           <div class ="container">
           <table id="table2" class = "w3-table-all w3-centered w3-hoverable">
             <thead>
               <tr class="w3-hover-orange">
                 <th>UserID</th>
                 <th>Name</th>
                 <th>Time Log</th>
               </tr>
             </thead>
             <tbody>
               <?php
               while($row2 = $result2->fetch_assoc()){
                 echo "<tr>
                 <td>".$row2["User_ID"]."</td><td>".$row2["Firstname"]."</td><td>";
                 if ($row2["Timestamp"]==NULL) {
                   echo "CURRENTLY IN USE";
                 }else {
                   echo $row2["Timestamp"]."</td></tr>";
                 }
               }
               ?>
             </tbody>
           </table>
         </div>
             </p>
      </div>
    </div>
  </div>

<?php
mysqli_close($conn);
?>
<!-- TABLE 2 ENDS HERE, CLOSE CONNECTION TO DATABASE --->

<!-- footer code starts here -->

<div class="footer">
        		<div class="col-sm-4 text-center">
        			<br />
           		 <p><a href="#" class="about">About Us</a></p>


           		 </div>
            	<div class="col-sm-4 text-center border-left">

              	<br />
               	<a href="#" class="about">Staff Login</a>
           		</div>
           		<div class="col-sm-4 col-xs-12 text-center border-left">
            		<h5 class="ft-text-title">Follow Us:</h5>
            		<div class="pspt-dtls">
                		<a href="#" class="about">FACEBOOK | </a>
               			 <a href="#" class="about">TWITTER | </a>
                		<a href="#" class="about">INSTAGRAM</a>
               			 <br><br><br><br><br><br><br>
            		</div>
       			 </div>

		</div>
<!-- footer code ends here --->

</body>
</html>
