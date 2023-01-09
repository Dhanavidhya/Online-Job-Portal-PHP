<link rel="stylesheet" href="../css/admin.css">

<?php

session_start();

$con = mysqli_connect('localhost', 'root', '','dreamjobs');
$id = $_GET['id'];
$sql = "DELETE FROM `admin` WHERE `id` = '$id'";
$res = mysqli_query($con,$sql);
if($res){
    //echo "Admin deleted";
    $_SESSION['delete'] = "<div style=' color: #1dd1a1;'>Admin Deleted Successfully</div>";
    header("Location: manage-admin.php");
}
else{
    //echo "Not deleted!";
    $_SESSION['delete'] = "<div 'color: #ee5253;'>Failed To Delete Adimin. Try Again Later!</div>";
    header("Location: manage-admin.php");
}

?>