<?php  


$dbServername = "localhost";
$dbUsername = "root";


$conn = mysqli_connect($dbServername,$dbUsername,'','testing');
$query = "SELECT student.SID,student.Firstname,student.Lastname,Machine.Mname,Machine.MID,Machine.Location FROM student,Machine,access WHERE Machine.MID=access.M_ID AND student.SID=access.S_ID  ORDER BY student.SID DESC";
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
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.js"></script> -->




<script src="js/jquery-3.1.0.js"></script>

</head>
<body>

	<header>
    <img src="https://www.uta.edu/_templates/_images/responsive/uta-logo-main.png" >
  </header>
		
  <!-- Navar starts here -->
		  <div class="topnav">
  			<a href="http://192.168.64.2/my_files/Makerspace/home/homepage.html">Home</a>
        <a href="http://192.168.64.2/my_files/Makerspace/student/newStudent.php">Students</a>
        <a href="http://192.168.64.2/my_files/Makerspace/machines/machines.php">Machines</a>
        <a href="http://192.168.64.2/my_files/Makerspace/history/History.php">History</a>
        <a href="http://192.168.64.2/my_files/Makerspace/admin/admin.php">Admin</a>
		</div> 

<br/>
	
<!-- Add and remove buttons -->
  <div>
  <button type="button" class="btn btn-default " data-toggle = "modal" data-target="#add_data_Modal">ADD STUDENT </button>
   <button type="button" class="btn btn-default " data-toggle = "modal" data-target="#remove_data_Modal">REMOVE STUDENT</button>
   <button type="button" class="btn btn-default btn_right" data-toggle = "modal" data-target="#remove_access_Modal">REMOVE ACCESS</button>  
   <button type="button" class="btn btn-default btn_right " data-toggle = "modal" data-target="#add_access_Modal">ADD ACCESS </button>
   
</div>
<!-- Table starts here -->
<div id = student_table>
 <table>
      
      <tr> 
      <br/> 
      <th>Student ID</th>
      <th>Name</th> 
      <th >Mname</th>
      <th >Location</th>
      
      </tr>
      <?php
        //while($row = $result-> fetch_assoc())
      $query = "SELECT S_ID , M_ID, student.Firstname,student.Lastname,Machine.Mname,Machine.Location FROM access, student,Machine WHERE student.SID=access.S_ID AND Machine.MID=access.M_ID ";
      $result = mysqli_query($conn, $query);
       while($row = mysqli_fetch_array($result))
      
        {
          ?>
            <tr>
            <td><?php echo $row['S_ID']; ?></td>
            <td><?php echo $row['Firstname']; ?> <?php echo $row['Lastname']; ?></td>
            <td><?php echo $row['Mname']; ?></td> 
            <td><?php echo $row['Location']; ?></td>   
            
            </tr>
        <?php
        }
          ?>
       
     </table> 
</div>


<!-- 
	<The footer for tha page   --> 
    	<div class="footer"> 
        		<div class="col-sm-4 text-center">
        			<br />
           		 <p><a href="#" class="about">About Us</a></p>
            
            
           		 </div>
            	<div class="col-sm-4 text-center border-left">
          
              	<br />
               
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

 <!-- Code for the modal to add student -->
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
     <input type="text" name="SID" id="SID" class="form-control" />
     <br />
     <label>First Name</label>
     <input type="text" name="Firstname" id="Firstname" class="form-control" />
     <br />
     <label>Last Name</label>
     <input type="text" name="Lastname" id="Lastname" class="form-control" />
     
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

 <!-- Code for the modal to remove student -->
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
     <input type="text" name="SID" id="SID" class="form-control" />
     <br />
     <!-- <label>Student Name</label>
     <input type="text" name="Firstname" id="Firstname" class="form-control" />
     <br />
     <label>Last Name</label>
     <input type="text" name="Lastname" id="Lastname" class="form-control" />
    
     <br /> -->
     
     <input type="submit" name="remove" id="remove" value="Remove" class="btn btn-success delete_button" >
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
   </div>
  </div>
 </div>

<!-- MOdal Code to Grant student an access to a machine -->
<!-- add is complete -->
 <div id="add_access_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">ADD ACCESS</h4>
   </div>
   <div class="modal-body">
     <!-- <form action="newInsert.php" method="post" id="insert_form">  -->
    <form method="post" id="access_form"> 


     <label>Student ID</label>
     <input type="text" name="SID" id="SID" class="form-control" />
     <br />
     <label>Machine ID</label>
     <input type="text" name="MID" id="MID" class="form-control" />
  
     
     <br />
     
     <input type="submit" name="access_insert" id="access_insert" value="Insert" class="btn btn-success" />
 
    </form>
  
  
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

 <!-- Code for the modal to remove access of student -->
<div id="remove_access_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">REMOVE ACCESS</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="removeaccess_form">
     <label>Student ID</label>
     <input type="text" name="SID" id="SID" class="form-control" />
     <br />
     <label>Machine ID</label>
     <input type="text" name="MID" id="MID" class="form-control" />
    
     <br />
     
     <input type="submit" name="remove_access" id="remove_access" value="Remove" class="btn btn-success delete_button" >
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
    
      
      var SID = $('input[name=SID]').val();
      var Firstname = $('input[name=Firstname]').val();
      var Lastname = $('input[name=Lastname]').val();
       
     if (SID== '' || Firstname == '' || Lastname == '') {
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
          alert(data); // Data Inserted 
         $('#insert_form').trigger('reset');   
         $('#add_data_Modal').modal('hide'); 
         $('#student_table').html(data);  
         location.reload();        
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
     //remove input validation finished 
    $('#remove').click(function (event) {       
      event.preventDefault();

      // the val ='' is not working with remove 
       
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
          alert(data);
         $('#remove_form').trigger('reset');   
         $('#remove_data_Modal').modal('hide'); 
         $('#student_table').html(data); 
         location.reload(); 

        }      
      });
       
      //cancel the submit button default behaviours
      //return false;
    
    });

}); 
 
 
 </script>

<!-- script for add access -->
<script>
    $(document).ready(function() {
      
     //if submit button is clicked
     
    $('#access_insert').click(function (event) {       
      event.preventDefault();
    
      
      var SID = $('input[name=SID]').val();
      var MID = $('input[name=MID]').val();
     
       // empty field not working
     // if (SID == '' || MID == '') {
     //     alert("Please Fill All Fields");
     //     $('#access_form').trigger('reset');   
     //     $('#add_access_Modal').modal('hide'); 
     //    }
      // else {  
       
      //start the ajax
      $.ajax({
        url:"addAccess.php",  
        method:"POST",  
        data:$('#access_form').serialize(),  
         // beforeSend:function(){  
         //  $('#insert').val("Inserting");  
         //  }, 
         cache: false, 
        success:function(data){  
         // alert('Student has been added to the Machine.');
         alert(data);
         $('#access_form').trigger('reset');   
         $('#add_access_Modal').modal('hide'); 
         // $('#student_table').html(data);
         location.reload();           
        }      
      });
       
      //cancel the submit button default behaviours
      //return false;
     //}
    });

}); 
 
 
 </script>

 <script>
    $(document).ready(function() {
      
     //if submit button is clicked
     
    $('#remove_access').click(function (event) {       
      event.preventDefault();
    
      
      // var SID = $('input[name=SID]').val();
      // var MID = $('input[name=MID]').val();
     
       // empty field not working
     // if (SID == '' || MID == '') {
     //     alert("Please Fill All Fields");
     //    }
     //   else {  
       
      //start the ajax
      $.ajax({
        url:"removeAccess.php",  
        method:"POST",  
        data:$('#removeaccess_form').serialize(),  
         // beforeSend:function(){  
         //  $('#insert').val("Inserting");  
         //  }, 
         cache: false, 
        success:function(data){  
         // alert('Student has been added to the Machine.');
         alert(data);
         $('#removeaccess_form').trigger('reset');   
         $('#remove_access_Modal').modal('hide'); 
         // $('#student_table').html(data);   
         location.reload();        
        }      
      });
       
      //cancel the submit button default behaviours
      //return false;
    // }
    });

}); 
 
 
 </script>