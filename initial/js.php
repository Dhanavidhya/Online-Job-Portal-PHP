<?php
session_start();
$lid = $_GET['id'];

if(isset($_POST['jsname'])){
  $con = mysqli_connect('localhost', 'root', '','JobPortal');

$jsname=$_POST['jsname'];
$location=$_POST['location'];
$mail=$_POST['mail'];
$contact=$_POST['cont'];
$qual=$_POST['qual'];
$obj=$_POST['obj'];
$exp=$_POST['exp'];

$sql1 = "INSERT INTO `jobseeker` (`login_id`,`js_name`, `js_contact`, `js_location`, `js_mail`,`js_qual`,`js_obj`, `js_exp`) VALUES ('$lid','$jsname', '$contact', '$location', '$mail', '$qual', '$obj', '$exp')";
$rs1 = mysqli_query($con, $sql1);
echo "1";
if($rs1)
{
      $sql = "SELECT * from `jobseeker` where `login_id` = '$lid'";  
      $res = mysqli_query($con, $sql);
      if($res){
        $rws = mysqli_fetch_assoc($res);
        $cid = $rws['js_id'];
      header("Location: jslogin.php?id=".$cid);
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
            <a href="/home" width="40" height=5><img src="../images/job.jpg" style="
                width:300px;
                height:300px"></a>  
          </div>
          <div class="right-side">
            <div class="topic-text">Seeker details</div>
          <form action="js.php?id=<?php echo $lid ;?>" method="POST">
          <div class="input-box">
                <input type="text" name="jsname" id="jsname" placeholder="Full Name" required>
            </div>
              <div class="input-box">
                <input type="text" name="location" id="location" placeholder="Location" required>
            </div>
            <div class="input-box">
                <input type="text" name="mail" id="mail" placeholder="Personal Mail id" required>
            </div>
            <div class="input-box">
                <input type="text" name="cont" id="cont" placeholder="Contact Number" required>
            </div>  
            <div class="input-box">
                <input type="text" name="qual" id="qual" placeholder="Highest Educational Qualification" required>
            </div> 

            <p>Optional</p>

            <div class="input-box">
                <input type="text" name="obj" id="obj" placeholder="Objective (Example: Seeking a position as a social worker providing service to the aged.)" required>
            </div>
            <div class="input-box">
                <input type="text" name="exp" id="exp" placeholder="Years Of Experience" required>
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