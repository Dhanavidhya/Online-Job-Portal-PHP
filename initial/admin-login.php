<?php

if(isset($_POST['user']))
{
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "dreamjobs";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  

    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
    $username = $_POST['user'];
    $password = md5($_POST['pass']);
      
    $sql = "select * from admin where username = '$username' and password = '$password'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
          
    if($count == 1){   
            header("Location: admin/manage-admin.php");            
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
        echo $username;
        echo $password;
        
    }     
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Admin Login Page</title>
</head>
<body>
    <div class="box-form">
        <div class="left">
            <div class="overlay">
                <h1>Dream Jobs</h1>
                <p>Choose your own jobs</p>
            </div>
        </div>
        <div class="right">
            <form action="admin-login.php" method="POST">
                <h4>ADMIN LOGIN</h4>
                <div class="inputs">
                    <input type="text" name="user" id="user" placeholder="Admin User Name">
                    <br>
                    <input type="password" name="pass" id="pass" placeholder="Admin Password"> 
                    <br>
                </div>
                <br>
                <div class="remember-me--forget-password">
                    <label>
                        <input type="checkbox" name="item" checked>
                        <span class="text-checkbox">Remember me</span>
                    </label>
                    <p>Forget Password</p>
                </div>
            
                <div class="button">
                    <input type="submit" name="submit" value="Go" >
                  </div>
            </form>
        </div>
    </div>
</body>
</html>