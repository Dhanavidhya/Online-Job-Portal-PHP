<?php
session_start();

if(isset($_POST['user']))
{
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "JobPortal";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  

    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
    $username=$_POST['user'];
    $password=$_POST['pass'];
    $tp = $_POST['tpType'];  
      
    $sql = "select * from login where username = '$username' and password = '$password'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
          
    if($count == 1){ 
        echo "cc";  
        $sql1 = "SELECT * from `login` where `username` = '$username' and `password` = '$password'";  
        $res = mysqli_query($con, $sql1);
      if($res){
          echo "22";
        $rws = mysqli_fetch_assoc($res);
        $login = $rws['login_id'];

        if($tp == 'jobseeker'){
            echo "00";

            $sql3 = "SELECT * from `jobseeker` where `login_id` = '$login'";  
            $res3 = mysqli_query($con, $sql3);
            if($res3){
               $rws3 = mysqli_fetch_assoc($res3);
               $jid = $rws3['js_id'];
               header("Location: jslogin.php?id=".$jid);
              //echo "Location: js.php?id=".$login;
              }
              else{
                  echo "Invalid data";
              }
        }
        else{
            $sql4 = "SELECT * from `company` where `login_id` = '$login'";  
            $res4 = mysqli_query($con, $sql4);
            if($res4){
               $rws4 = mysqli_fetch_assoc($res4);
               $cid = $rws4['comp_id'];
            header("Location: companylogin.php?cid=".$cid);
        }
        else{
            echo "Inalid data!";
        }
          }
      }
            
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }     
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Login Page</title>
</head>
<body>
    <div class="box-form">
        <div class="left">
            <div class="overlay">
                <h1>Dream Jobs</h1>
                <p>Choose your jobs</p>
            <span>
                <p>Login with Other Resources</p>
                <a href="#"> Login with Google</a>
            </span>
            </div>
        </div>
        <div class="right">
            <form action="login.php" method="POST">
                <h4>LOGIN</h4>
                <p>Don't have an account? <a href="create.php">Create your account here</a></p>
                <div class="inputs">
                    <input type="text" name="user" id="user" placeholder="User name">
                    <br>
                    <input type="password" name="pass" id="pass" placeholder="Password"> 
                    <br>
                    <p>Choose one </p>
                    <select name="tpType" id="tpType">
                        <option value="jobseeker">Job Seeker</option>
                        <option value="company">Job Provider</option>
                    </select>
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