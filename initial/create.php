<?php include("partials/menu.php") ;
session_start();

if(isset($_POST['submit'])){
  $con = mysqli_connect('localhost', 'root', '','JobPortal');
  $username=$_POST['username'];
  $password=$_POST['password'];
  $selected_val = $_POST['tpType'];

  $email=$_POST['email'];
  $sql1 = "INSERT INTO `login` (`username`, `password`, `email`) VALUES ('$username', '$password', '$email')";
  $rs1 = mysqli_query($con, $sql1); 
  if($rs1)
  {
      $sql = "SELECT * from `login` where `username` = '$username' and `password` = '$password'";  
      $res = mysqli_query($con, $sql);
      if($res){
        //echo "---";
        $rws = mysqli_fetch_assoc($res);
        $login = $rws['login_id'];

        if($selected_val == 'jobseeker'){
              header("Location: js.php?id=".$login);
              //echo "Location: js.php?id=".$login;
        }
        else{
            header("Location: company.php?id=".$login);
          }
      }
  }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../styles/create_.css">
    <title>Create Account</title>
</head>
<body>
    <div class="container">
        <div class="content">
          <div class="left-side">
            <a href="/home" width="40" height=5><img src="../images/job.jpg" style="
                width:300px;
                height:300px"></a>  
          </div>
          <div class="right-side">
            <div class="topic-text">Create Your Account</div>

          <form action="create.php" method="POST">
            <div class="input-box">
              <input type="text" name="username" placeholder="Enter username" required>
            </div>
            <div class="input-box">
              <input type="text" name="password" placeholder="Enter password" required>
            </div>
            <div class="input-box">
              <input type="text" name="email" placeholder="Enter login mail" required>
            </div>

            <div>
              <label for="tp">Which best describes you </label>
            <select name="tpType" id="tpType">
              <option value="jobseeker">Job Seeker</option>
              <option value="company">Job Provider</option>
            </select>
            </div>
            <div class="button">
              <input type="submit" name="submit" value="Next" >
            </div>
          </form>
        </div>
        </div>
      </div>
</body>
</html>