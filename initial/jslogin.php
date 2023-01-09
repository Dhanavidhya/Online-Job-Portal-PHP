<?php include("partials/menu.php") ;
session_start();
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
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
.btn{
  padding: 13px;
    margin: 7px;
    border-radius: 58px;
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
    <title>Dream Jobs</title>
</head>
<body>

<div class="menu">
  <div class="wrapper">
            <ul>
              <a class="wel" href="home.php"><b> Welcome !</b></a>
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
        
        <div class="aligncenter"><h2 class="aligncenter">Jobs for you...</h2><br/>
      </div>
    </div>
    <?php 
      $server = "localhost";
      $username = "root";
      $password = "";
  
      // Create a database connection
      $con = mysqli_connect($server, $username, $password, 'JobPortal');

      $sql = "SELECT * FROM `job`";
      $rs = mysqli_query($con, $sql);
      foreach ($rs as $company ) { 
      ?>
      <div class="preview">
        <div class="in">
          <h3><?php 
            $cmp =  "SELECT * FROM `company`";
            $qry = mysqli_query($con,$cmp);
            foreach ($qry as $q ) {      
            ?>
            <div class="pin">
              <div class="poin">
                  <h3><?php 
                    if($q['comp_id']==$company['comp_id']){
                      echo $q['comp_name'];?></h3>
                      <?php }?>
            </div>
          </div>
          </h3>
         <?php }?>
                    <p><?php echo $company['title'];?></p>
                    <p>Location : <?php echo $company['location'];?></p>
                    <p>Qualification : <?php echo $company['qualification'];?></p>
                    <p>Experience required: <?php echo $company['experience'];?></p>
                    <p>Vacancy : <?php echo $company['vacancy'];?></p>
                    <p>Salary : ₹ <?php echo $company['salary'];?></p>

                    <a href="apply.php?id=<?php echo $id ;?>&jobid=<?php echo $company['job_id'] ?>" class="btn-danger"> Apply</a>

                </div>
            </div>

    <?php } ?> 
  </div>
</div>
                    <div class="footer">
        <div class="wrapper-foot">
        ALL RIGHTS RESERVED
        </div>
    </div>
   </body>
   </html>