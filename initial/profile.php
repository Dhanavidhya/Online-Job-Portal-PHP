<?php

session_start();

$con = mysqli_connect('localhost', 'root', '','JobPortal');
$id = $_GET['id'];
//echo $id;

$sql = "SELECT * FROM `jobseeker` WHERE `js_id` = '$id'";
$res = mysqli_query($con,$sql);
$rws = mysqli_fetch_assoc($res);
if($res){
    //echo "Sucess";
    //echo $rws["js_name"];
    //echo $rws["js_obj"];
    ?>
    
    <head>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{

      margin: 0px;
padding: 0px;
box-sizing: border-box;
font-family: "Poppins" , sans-serif;
color: #833471;
text-align: center;
   }
   .btn{
  padding: 13px;
    margin: 7px;
    border-radius: 58px;
}
   .preview{margin: 25px 0;
padding: 26px 17px;
border-bottom: 2px solid #833471;
display: inline-block;
width: 70%;

   }
   .preview:hover{
  box-shadow: 5px 3px 5px 3px #833471;
}
.row{
  background-color: rgb(225, 225, 228);
    padding: 2% 0;
}
.aligncenter{
  margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: "Poppins" , sans-serif;
    background-color: rgb(225, 225, 228);
    color: #833471;
    text-align: center;
}
.preview h3{
  font-size: 20px;
  color: rgb(174, 174, 174);
  margin-bottom: 8px;
}
*{
    margin: 0;
    padding: 0;
    font-family: 'Times New Roman', Times, serif;
}
.clear{
    float: none;
    clear: both;
}
.wrapper{
    padding: 1%;
    width: 80%;
    margin: 0 auto;
}
.text-center{
    text-align: center;
}
.wel{
  text-decoration: none;
    font-weight: bold;
    color: #833471;
}
.footer{
    background-color: #833471;
    columns: white;
}
.wrapper-foot{
  color:white;
  padding:1%;
}
.menu ul{
    list-style-type: none;
}
.menu ul li{
    display: inline;
    padding: 1%;
}
.menu{
    text-align: center;
    border-bottom: 1px solid black;
}

.menu ul li a{
    text-decoration: none;
    font-weight: bold;
    color: #833471;
}
.menu ul li a:hover{
    color: #D980FA;
}
</style>
    <title>Job Providers</title>
</head>
<body>
 
<div class="menu">
  <div class="wrapper">
            <ul>
              <a class="wel" href="home.php"><b> Welcome !</b></a>
              <li ><a href="jobpost.php"><b>Create a job post</b></a></li>
        <li >
          <a href="out.php"><b>Sign out</b></a>
        </li>
        <li >
          <a href="home.php"><b>Log out</b></a>
        </li>
            </ul>
        </div>
    </div>
 
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aligncenter">
          <h2 class="aligncenter">Profile</h2><br/>
        </div>
      </div>
      <div class="preview">
        <div class="in">
                    <p><b><?php echo $rws['js_name'];?></b></p>
                    <br/>
                    <i><?php echo $rws['js_obj'];?></i>
                    <br/>
                    <br/>
                    <p>Qualification  :  <?php echo $rws['js_qual'];?></p>
                    <br>
                    <p>Experience  :  <?php echo $rws['js_exp']." years";?></p>
                    <br>
                    <p>Location  :  <?php echo $rws['js_location'];?></p>
<br>
                    <p>Contact Mail  :  <?php echo $rws['js_mail'];?></p>
                    <br>
                </div>
            </div>
    </div>
 </div>
 <div class="footer" style="background-color: #833471;
    columns: white;">
        <div class="wrapper-foot">
        ALL RIGHTS RESERVED
        </div>
    </div>
</body>  
    
    
    
    <?php
    
}
else{
    header("Location: companylogin.php");
}

?>