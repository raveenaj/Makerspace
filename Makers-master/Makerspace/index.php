
<!DOCTYPE html>
<html>
<head>
   <script language="javascript" type="text/javascript">

        window.history.forward();
        //window.location.replace("http://192.168.64.2/my_files/Makerspace/home/homepage2.html");


   
       if(performance.navigation.type == 2){
   location.reload(true);
}
       
   

        
    </script>  

 <title> Login </title>
 <link rel="stylesheet" a href=".\style.css">
 <link rel="stylesheet" a href="css\font-awesome.min.css">
</head>
<body>
    <div class="container">
        <img src="./logo.jpg">
        <form method="POST" action="#">
            <div class="form-input">
                <input type="text" name="username" placeholder="Enter the User Name"/> <!-- is it supposed to be username? -->
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="password"/>
            </div>
            <input type="submit" type="submit" value="LOGIN" class="btn-login"/>
            </form>
        </div>
</body>
</html>

<?php 
 
$host="http://192.168.64.2";
$user="root";
$password="";
$db="testing";
 
$link=mysqli_connect("localhost",$user,$password);
mysqli_select_db($link, "testing");
 
if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $query = "SELECT netid,Password from Administrator where netid=? AND Password=?";

    if($stmt2 = $link->prepare($query)) { // assuming $mysqli is the connection
    $stmt2->bind_param("ss", $uname, $password);
    $stmt2->execute();
    // any additional code you need would go here.
} else {
    $error = $link->errno . ' ' . $link->error;
    echo $error; // 1054 Unknown column 'foo' in 'field list'
}
    
   /* $stmt = $link->prepare($query);
    $stmt->bind_param("ss", $uname, $password);
    $stmt->execute();
    $stmt->bind_result($uname, $password);
    $stmt->store_result();*/
    
    
    if($stmt2->fetch()){
       // echo " You Have Successfully Logged in";
       // exit();

        $_SESSION['login_user'] = $uname; // Initializing Session
       // header("C:\xampp\htdocs\myfiles\login form\links\BootStrap\studentModal.html"); // Redirecting To Profile Page
        header("location:home/homepage.html");

        
    }
    else{
        $error = "Username or Password is invalid";
       // echo $error;
        echo '<p style="text-align:center; 
        color:red;" >Username or Password is Invalid!</p>';
    }


        // if(!isset($_SESSION['login_user'])){
        //     header("Location:home/homepage2.html");
        //     exit;
        //         }
        
}
?>

