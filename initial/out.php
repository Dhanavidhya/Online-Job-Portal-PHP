<?php

if(isset($_POST['user'])){
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "JobPortal";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
      
    $username=$_POST['user'];
    $password=$_POST['pass'];

    $del = "delete from login where username = '$username' and password = '$password'";
    if(mysqli_query($con, $del)){
        header("Location: php/sucessdel.php");
    } 
    else{
        echo "ERROR: Could not able to execute $del. " . mysqli_error($con);
    }       
}
?>

<html lang="en">
<head>
    <title>Sign out - Alert</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style media="screen">
    	*,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #833471;
}
.popup{
    background-color: #ffffff;
    width: 420px;
    padding: 30px 40px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
    border-radius: 8px;
    font-family: "Poppins",sans-serif;
    display: none; 
    text-align: center;
}
.popup button{
    display: block;
    margin:  0 0 20px auto;
    background-color: transparent;
    font-size: 30px;
    color: #ffffff;
		background: #03549a;
		border-radius: 100%;
		width: 40px;
		height: 40px;
    border: none;
    outline: none;
    cursor: pointer;
}
.popup h2{
	margin-top: -20px;
}
.popup p{
    font-size: 14px;
    text-align: justify;
    margin: 20px 0;
    line-height: 25px;
}
a{
    display: block;
    width: 150px;
    position: relative;
    margin: 10px auto;
    text-align: center;
    background-color: #833471;
		border-radius: 20px;
    color: #ffffff;
    text-decoration: none;
    padding: 8px 0;
}
    </style>
</head>
<body>
    <div class="popup">
        <button id="close">&times;</button>
        <h2>You are signing out!</h2>
        <p>
           If you clicked sign out mistakenly you can go back any time. If you are sure to sign out click the below icon.
        </p>
        <form action="out.php" method="POST">
        <div class="inputs">
            <p> <b> Enter your username and password below to confirm sign out.</b></p>
                    <input type="text" name="user" id="user" placeholder="User name">
                    <br>
                    <br>
                    <input type="password" name="pass" id="pass" placeholder="Password"> 
                    <br>
                </div>
                <br>
                <div class="button">
                    <input type="submit" name="submit" value="Sign out" >
                    <a href="home.php">Back to home</a>
                  </div>
        </form>

    </div>
    <script type="text/javascript">
window.addEventListener("load", function(){
    setTimeout(
        function open(event){
            document.querySelector(".popup").style.display = "block";
        },
        2000 
    )
});


document.querySelector("#close").addEventListener("click", function(){
    document.querySelector(".popup").style.display = "none";
});
    </script>
</body>
</html>