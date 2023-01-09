<?php
session_start();
$lid = $_GET['id'];?>
<?php

if(isset($_POST['submit'])){
  $con = mysqli_connect('localhost', 'root', '','JobPortal');
  $cname=$_POST['cname'];
  $location=$_POST['location'];
  $mail=$_POST['mail'];
  $contact=$_POST['cont'];
  $numep=$_POST['numep'];
  $website=$_POST['website'];
  echo "--";

  $sql1 = "INSERT INTO `company` (`login_id`,`comp_name`, `comp_location`, `comp_website`, `comp_mail`, `num_employees`, `comp_contact`) VALUES ('$lid','$cname', '$location', '$website', '$mail', '$numep', '$contact');";
  $rs1 = mysqli_query($con, $sql1);
  echo $sql1;
  //die();
  if($rs1)
  {
      echo "Company  added!!";
      $sql = "SELECT * from `company` where `login_id` = '$lid'";  
      $res = mysqli_query($con, $sql);
      if($res){
        $rws = mysqli_fetch_assoc($res);
        $cid = $rws['comp_id'];
      header("Location: companylogin.php?cid=".$cid);
      }
      else{
        echo "Invaid data!";
      }
  }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/create_.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <title>Create Account</title>
</head>
<body>
    <div class="container">
        <div class="content">
          <div class="left-side">
            <a href="/Online-Job-portal-PHP/initial/home.php" width="40" height=5><img src="../images/job.jpg" style="
                width:300px;
                height:300px"></a>  
          </div>
          <div class="right-side">
            <div class="topic-text">Company details</div>
          <form action="company.php?id=<?php echo $lid; ?>" method="POST">
          <div class="input-box">
                <input type="text" name="cname" id="cname" placeholder="Enter name of your company" required>
            </div>
              <div class="input-box">
                <input type="text" name="location" id="location" placeholder="Enter location" required>
            </div>
            <div class="input-box">
                <input type="text" name="website" id="website" placeholder="Enter website ( ex : www.goodsales.com)" required>
            </div>
            <div class="input-box">
                <input type="text" name="mail" id="mail" placeholder="Enter company mail" required>
            </div>
            <div class="input-box">
                <input type="text" name="numep" id="numep" placeholder="Enter the number of employees" required>
            </div>
            <div class="input-box">
                <input type="text" name="cont" id="cont" placeholder="Enter contact number" required>
            </div>

            <div class="button">
              <input type="submit" name="submit" value="Create" >
            </div>
          </form>
        </div>
        </div>
      </div>
</body>
</html>