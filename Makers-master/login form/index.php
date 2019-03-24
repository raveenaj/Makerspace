<?php 
 
$host="http://192.168.64.2";
$user="root";
$password="";
$db="demo";
 
$link=mysqli_connect("localhost",$user,$password);
mysqli_select_db($link, "demo");
 
if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $query = "SELECT User,Pass from loginform where User=? AND Pass=?";

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
        header("location:Home/idk.html");
    }
    else{
        $error = "Username or Password is invalid";
    }
        
}
?>

<!DOCTYPE html>
<html>
<head>
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