<?php  


$dbServername = "localhost";
$dbUsername = "root";


$conn = mysqli_connect($dbServername,$dbUsername,'','testing');
// $query = "SELECT * FROM student ORDER BY ID DESC";
// $result = mysqli_query($conn, $query);

 ?>  

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
  <title>Add/Remove Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/admin.css">
  <!-- <script src="newStudent.js"></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.js"></script> -->




<!-- <script src="js/jquery-3.1.0.js"></script> -->

</head>
<body>

  <header>
    <img src="https://www.uta.edu/_templates/_images/responsive/uta-logo-main.png" >
  </header>
    

     <div class="topnav">
      <a href="http://192.168.64.2/my_files/Makerspace/home/homepage.html">Home</a>
        <a href="http://192.168.64.2/my_files/Makerspace/student/newStudent.php">Students</a>
        <a href="http://192.168.64.2/my_files/Makerspace/machines/machines.php">Machines</a>
        <a href="http://192.168.64.2/my_files/Makerspace/history/History.php">History</a>
        <a href="http://192.168.64.2/my_files/Makerspace/admin/admin.php">Admin</a>
    </div> 

<br/>

  <div>
    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
       <button type="button" class="btn btn-default button1" data-toggle = "modal" data-target="#add_data_Modal">ADD ADMIN </button>
       </div>
 
  <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
   <button type="button" class="btn btn-default button1" data-toggle = "modal" data-target="#remove_data_Modal">REMOVE ADMIN</button> 
   </div>
   <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
   <button type="button" class="btn btn-default button1" data-toggle = "modal" data-target="#change_data_Modal">CHANGE PASSWORD</button> 
   </div>
</div>
<!-- <div id = admin_table>
 <table>
    
      <tr> 
      <br/> 
      <th>Admin NetID</th>
      </tr>
      <?php
        //while($row = $result-> fetch_assoc())
      // $query = "SELECT * FROM Administrator ";
      // $result = mysqli_query($conn, $query);
       // while($row = mysqli_fetch_array($result))
      
        {
          ?>
            <tr>
            <td><?php //echo $row['netid']; ?></td>
            
            
            </tr>
        <?php
        }
          ?>
       
     </table> 
</div> -->


<!-- 
  <div class="container-fluid">  --> 
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


<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">ADD ADMINS</h4>
   </div>
   <div class="modal-body">
     <!-- <form action="newInsert.php" method="post" id="insert_form">  -->
    <form method="post" id="insert_form"> 


      <label>Admin NetID</label>
     <input type="text" name="AID" id="AID" class="form-control" />
     <label>Password</label>
     <input type="password" name="Pass" id="Pass" class="form-control" />
     <label>Confirm Password</label>
     <input type="password" name="CPass" id="CPass" class="form-control" />
     <br />
     
     <input type="submit" name="add" id="add" value="ADD" class="btn btn-success" />
 
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
    <h4 class="modal-title">REMOVE ADMINS</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="remove_form">
    <label>Admin ID</label>
     <input type="text" name="AID" id="AID" class="form-control" />
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

 <div id="change_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Only Authorized Admins can change other Admin's Password</h4>
   </div>
   <div class="modal-body">
     <!-- <form action="newInsert.php" method="post" id="insert_form">  -->
    <form method="post" id="change_form"> 


      <label>Authorized Admin NetID</label>
     <input type="text" name="AAID" id="AAID" class="form-control" />
     <label>Authorized Admin Password</label>
     <input type="password" name="APass" id="APass" class="form-control" />

     <label>NetID of Admin that requires Password Change</label>
     <input type="text" name="CAID" id="CAID" class="form-control" />
     <label>New Password</label>
     <input type="password" name="CPass" id="CPass" class="form-control" />
     <label>Confirm New Password</label>
     <input type="password" name="CCPass" id="CCPass" class="form-control" />
     <br />
     
     <input type="submit" name="change" id="change" value="change" class="btn btn-success" />
 
    </form>
    <div class="message"></div>
  
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
     
    $('#add').click(function (event) {       
      event.preventDefault();
    
      
     //  var MID = $('input[name=MID]').val();
     //  var Mname = $('input[name=Mname]').val();
     //  var location = $('input[name=location]').val();
       
     // if (MID== '' || Mname == '' || location == '') {
     //     alert("Please Fill All Fields");
     //    }
     //   else {  

      // reload does not work with val=''
       
      //start the ajax
      $.ajax({
        url:"adminadd.php",  
        method:"POST",  
        data:$('#insert_form').serialize(),  
         // beforeSend:function(){  
         //  $('#insert').val("Inserting");  
         //  }, 
         cache: false, 
        success:function(data){  
          alert(data);
         $('#insert_form').trigger('reset');   
         $('#add_data_Modal').modal('hide'); 
        // $('#machine_table').html(data); 
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
     
    $('#remove').click(function (event) {       
      event.preventDefault();
     
    
       
      //start the ajax
      $.ajax({
        url:"adminremove.php",  
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
         //$('#machine_table').html(data); //machine_table should change 
         location.reload();          
        }      
      });
       
      //cancel the submit button default behaviours
      //return false;
    
    });

}); 
 
 
 </script>

 <script>
    $(document).ready(function() {
     
    $('#change').click(function (event) {       
      event.preventDefault();
     
    
       
      //start the ajax
      $.ajax({
        url:"adminchange.php",  
        method:"POST",  
        data:$('#change_form').serialize(),  
         // beforeSend:function(){  
         //  $('#insert').val("Inserting");  
         //  }, 
         cache: false, 
        success:function(data){  
          alert(data);
         $('#change_form').trigger('reset');   
         $('#change_data_Modal').modal('hide'); 
        // $('#machine_table').html(data); 
         location.reload();          
        }      
      });
       
      //cancel the submit button default behaviours
      //return false;
    
    });

}); 
 
 
 </script>

