<?php  


$dbServername = "localhost";
$dbUsername = "root";


$conn = mysqli_connect($dbServername,$dbUsername,'','testing');
$query = "SELECT * FROM student ORDER BY ID DESC";
$result = mysqli_query($conn, $query);

 ?>  

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
	<title>Add/Remove Students</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="student.css">
  <!-- <script src="newStudent.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>




<script src="js/jquery-3.1.0.js"></script>

</head>
<body>

	<header>
    <img src="https://www.uta.edu/_templates/_images/responsive/uta-logo-main.png" >
  </header>
		

		 <div class="topnav">
  			<a href="http://192.168.64.2/my_files/login%20form/Home/idk.html#">Home</a>
  			<a href="http://192.168.64.2/my_files/login%20form/studentNew/newStudent.php">Students</a>
  			<a href="http://192.168.64.2/my_files/login%20form/machines/machines.php">Machines</a>
  			<a href="http://192.168.64.2/my_files/login%20form/history.html">History</a>
		</div> 

<br/>

  <div>
  <button type="button" class="btn btn-default " data-toggle = "modal" data-target="#add_data_Modal">ADD STUDENT </button>
   <button type="button" class="btn btn-default " data-toggle = "modal" data-target="#remove_data_Modal">REMOVE STUDENT</button> 
</div>
<div id = student_table>
 <table>
      
      <tr> 
      <br/> 
      <th>ID</th>
      <th>Student Name</th> 
      <th >Equipment</th>
      </tr>
      <?php
        //while($row = $result-> fetch_assoc())
      $query = "SELECT * FROM student ORDER BY ID ASC";
      $result = mysqli_query($conn, $query);
       while($row = mysqli_fetch_array($result))
      
        {
          ?>
            <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Equipment']; ?></td> 
            </tr>
        <?php
        }
          ?>
       
     </table> 
</div>


<!-- 
	<div class="container-fluid">  --> 
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
</body>
</html>


<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">ADD STUDENT</h4>
   </div>
   <div class="modal-body">
     <!-- <form action="newInsert.php" method="post" id="insert_form">  -->
    <form method="post" id="insert_form"> 


      <label>Student 1000 ID</label>
     <input type="text" name="ID" id="ID" class="form-control" />
     <br />
     <label>Student Name</label>
     <input type="text" name="name" id="name" class="form-control" />
     <br />
     <label>Equipment Name</label>
     <select name="equipment" id="equipment" class="form-control"> 
      <option value=" "></option> 
      <option value="3D Printer">3D Printer</option>  
      <option value="Chainsaw">Chainsaw</option>
     </select>
     <br />
     
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
 
    </form>
    <div class="message"></div>
  
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="remove_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">REMOVE STUDENT</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="remove_form">
    <label>Student 1000 ID</label>
     <input type="text" name="ID" id="ID" class="form-control" />
     <br />
     <label>Student Name</label>
     <input type="text" name="name" id="name" class="form-control" />
     <br />
     <label>Equipment Name</label>
     <select name="equipment" id="equipment" class="form-control">
      <option value=" "></option> 
      <option value="3D Printer">3D Printer</option>  
      <option value="Chainsaw">Chainsaw</option>
     </select>
     <br />
     
     <input type="submit" name="remove" id="remove" value="Remove" class="btn btn-success delete_button" >
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
   </div>
  </div>
 </div>

<script>
    $(document).ready(function() {
      
       
     
     //if submit button is clicked
     
    $('#insert').click(function (event) {       
      event.preventDefault();
    
      
      var ID = $('input[name=ID]').val();
      var name = $('input[name=name]').val();
      var equipment = $('input[name=equipment]').val();
       
     if (ID== '' || name == '' || equipment == ''|| equipment == " ") {
         alert("Please Fill All Fields");
        }
       else {  
       
      //start the ajax
      $.ajax({
        url:"newInsert.php",  
        method:"POST",  
        data:$('#insert_form').serialize(),  
         // beforeSend:function(){  
         //  $('#insert').val("Inserting");  
         //  }, 
         cache: false, 
        success:function(data){  
          alert('Data Inserted');
         $('#insert_form').trigger('reset');   
         $('#add_data_Modal').modal('hide'); 
         $('#student_table').html(data);          
        }      
      });
       
      //cancel the submit button default behaviours
      //return false;
    }
    });

}); 
 
 
 </script>

 <script>
    $(document).ready(function() {
     
    $('#remove').click(function (event) {       
      event.preventDefault();
     
    
       
      //start the ajax
      $.ajax({
        url:"newDelete.php",  
        method:"POST",  
        data:$('#remove_form').serialize(),  
         // beforeSend:function(){  
         //  $('#insert').val("Inserting");  
         //  }, 
         cache: false, 
        success:function(data){  
          alert('Student Record Deleted');
         $('#remove_form').trigger('reset');   
         $('#remove_data_Modal').modal('hide'); 
         $('#student_table').html(data);          
        }      
      });
       
      //cancel the submit button default behaviours
      //return false;
    
    });

}); 
 
 
 </script>

