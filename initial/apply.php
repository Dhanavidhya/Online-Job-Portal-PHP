
<?php
session_start();
$gloginid = $_GET["id"];
$gjobid = $_GET["jobid"];

if(isset($_POST['submit']))
{
  $con = mysqli_connect('localhost', 'root', '','JobPortal');
  
  $sql3 = "SELECT * from `jobseeker` where `login_id` = '$gloginid'";  
  $res3 = mysqli_query($con, $sql3);
  if($res3){
    $rws3 = mysqli_fetch_assoc($res3);
    $jid = $rws3['js_id'];
    $sql = "INSERT INTO `applicant` ( `js_id`, `job_id`, `status`) VALUES ( '$gloginid', '$gjobid', 'pending')";
    $rs = mysqli_query($con, $sql);
  if($rs){
      header("Location: php/sucessjs.php?id=".$gloginid);
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
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
   body{
        background-image: url("https://wallpaperaccess.com/full/1177739.jpg");
      }
      .button{
  display: inline-block;
  margin-top: 12px;
}
.container{
  width: 85%;
color: white;
background-clip: text;
}
.button{
  font-size: 18px;
  outline: none;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  background: #272727;
  cursor: pointer;
  transition: all 0.3s ease;
}
.button:hover{
  background: #a9a9aa;
}
.container .content .right-side{
  width: 75%;
  margin-left: 75px;
}
.content .right-side .topic-text{
  font-size: 23px;
  font-weight: 600;
  color: white;
}
.right-side .input-box{
  height: 50px;
  width: 100%;
  margin: 12px 0;
}

    </style>
    <title>Apply for Jobs</title>
</head>
<body>
    <div class="container">
        <div class="content">
          <div class="left-side">
            <a href="/home" width="40" height=5><img src="../images/apply.jpg" style="
                width:300px;
                height:300px"></a> 
          </div>
          <div class="right-side">
            <div class="topic-text">Apply for job</div>
          <form action="apply.php?id=<?php echo $gloginid; ?>&jobid=<?php echo $gjobid;?>" method="POST"> 

            <div class="input-box">
                <p>Check Your Details And Click Apply</p>
            </div>

            <div class="input-box">
                <?php
                $con = mysqli_connect('localhost', 'root', '','JobPortal');
                $sql = "SELECT * FROM `jobseeker` WHERE `js_id` = '$gloginid'";
                $res = mysqli_query($con,$sql);
                $rws = mysqli_fetch_assoc($res);
                if($res){
                ?>
                    <div class="content-app">
                    <b>Full Name : </b><?php echo $rws['js_name'];?><br>
                    <br/><b>Contact Number : </b><?php echo $rws['js_contact'];?><br>
                    <br/><b>Location : </b><?php echo $rws['js_location'];?><br>
                    <br/><b>Contact Mail : </b><?php echo $rws['js_mail'];?><br>
                    <br/><b>Qualification : </b><?php echo $rws['js_qual'];?><br>
                    <br/><b>Experience : </b><?php echo $rws['js_exp'];?>   <br>
                    </div>
            
                    <?php } ?>
                </select> 
            </div>

            <br><br><br><br><br><br><br><br><br>
            <div class="button">
              <input type="submit" name="submit" value="Apply" >
            </div>
          </form>
        </div>
        </div>
      </div>
</body>
</html>