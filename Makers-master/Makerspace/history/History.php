<?php  
 $connect = mysqli_connect("localhost", "root", "", "testing");  
 $query = "SELECT * FROM Machine";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>History</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
           <link rel="stylesheet" type="text/css" href="student.css">
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
           <!--  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>  this ruins the view modal-->


           
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


     
           <br /><br />  
           <!-- <div class="container" style="width:700px;">  --> 
            <div class="container" >  
                <h2 class="title" align="center">Machine Use History</h3>  
                <br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="25%">Machine ID</th>  
                                <th width="25%">Machine Name</th>
                                 <th width="25%">Location</th>  
                               <th width="25%">View</th>  
                          </tr>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["MID"]; ?></td>  
                               <td><?php echo $row["Mname"]; ?></td>  
                               <td><?php echo $row["Location"]; ?></td> 
                               <td><input type="button" name="view" value="view" id="<?php echo $row["MID"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
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
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Usage Details</h4>  
                </div>  
                <div class="modal-body" id="usage_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var tool_id = $(this).attr("id");  
           $.ajax({  
                url:"HistoryView.php",  
                method:"post",  
                data:{tool_id:tool_id},  
                success:function(data){  
                     $('#usage_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>