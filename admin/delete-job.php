<link rel="stylesheet" href="../css/admin.css">

<?php

session_start();

$con = mysqli_connect('localhost', 'root', '','JobPortal');
$id = $_GET['id'];
$sql = "DELETE FROM `job` WHERE `job_id` = '$id'";
$res = mysqli_query($con,$sql);
if($res){
    //echo "Admin deleted";
    $_SESSION['delete'] = "<div style=' color: #1dd1a1;'>Job Deleted Successfully</div>";
    header("Location: manage-jobs.php");
}
else{
    //echo "Not deleted!";
    $_SESSION['delete'] = "<div 'color: #ee5253;'>Failed To Delete Job. Try Again Later!</div>";
    header("Location: manage-jobs.php");
}

?>