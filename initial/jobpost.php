<?php
session_start();
$cid = $_GET['did'];

if(isset($_POST['submit'])){
  $con = mysqli_connect('localhost', 'root', '','JobPortal');

$title = $_POST['title'];
$location = $_POST['location'];
$qualification = $_POST['qualification'];
$experience = $_POST['experience'];
$salary =  $_POST['salary'];
$vacancy =  $_POST['vacancy'];

$sql = "INSERT INTO `job` ( `comp_id`, `title`, `location`, `qualification`, `experience`, `salary`, `vacancy`) VALUES ('$cid', '$title', '$location','$qualification','$experience', '$salary','$vacancy')";
//echo $cid;
$rs = mysqli_query($con, $sql);
if($rs)
{
  //echo "Location: php/sucesscp.php?id=".$cid;
  //die();
	header("Location: php/sucesscp.php?id=".$cid);
}
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/create_.css"/>
    <title>Create a job post</title>
</head>
<body>
    <div class="container">
        <div class="content">
          <div class="left-side">
             <a href="/Online-Job-portal-PHP/initial/home.php" width="40" height=5><img src="../images/index.png" style="
                width:300px;
                height:300px"></a>  
          </div>
          <div class="right-side">
            <div class="topic-text">Create a job post</div>
          <form action="jobpost.php" method="POST"> 

            <div class="input-box">
                    <label for="title">Job Title : </label>
                    <select name="title" id="title">
                      <option value="Software engineer">Software engineer</option>
                      <option value="Data Scientist">Data Scientist</option>
                      <option value="ML Engineer">ML Engineer</option>
                      <option value="Charted Accountant">Charted Accountant</option>
                      <option value="UI Designer">UI Designer</option>
                      <option value="Full Stack Developer">Full Stack Developer</option>
                      <option value="Back-end Developer">Back-end Developer</option>
                      <option value="Front-end Developer">Front-end Developer</option>
                      <option value="Analyst">Analyst</option>
                      <option value="Product Manager">Product Manager</option>
                    </select> 
            </div>
            <div class="input-box">
                <input type="text" name="location" id="location" placeholder="Enter location of job" required>
            </div>
            <div class="input-box">
                <input type="text" name="qualification" id="qualification" placeholder="Enter qualification" required>
            </div>
            <div class="input-box">
                <input type="text" name="experience" id="experience" placeholder="Enter needed experience" required>
            </div>
            <div class="input-box">
                <input type="text" name="salary" id="salary" placeholder="Enter salary" required>
            </div>
            <div class="input-box">
                <input type="text" name="vacancy" id="vacancy" placeholder="Enter vacancy" required>
            </div>

            <div class="input-box">
                <label for="cat_id">Choose job category : </label>
                <select name="cat_id" id="cat_id">
                  <option value="1">Data science</option>
                  <option value="2">Software</option>
                  <option value="3">Web Design</option>
                </select> 
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