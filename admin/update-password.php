<?php 
include("partials/menu.php") ;
session_start();
?>

<?php
if(isset($_POST["submit"])){

$con = mysqli_connect('localhost', 'root', '','dreamjobs');

$id = $_POST["id"];
$cur_pwd = md5($_POST["current_password"]); 
$new_pwd = md5($_POST["new_password"]); 
$con_pwd = md5($_POST["confirm_password"]);

$sql1 = "SELECT * FROM `admin` WHERE `id` = '$id' AND `password`='$cur_pwd'";
$rs1 = mysqli_query($con, $sql1);

if($rs1){
    $count = mysqli_num_rows($rs1);
    if($count==1){
        //echo "Found";
        if($new_pwd==$con_pwd){
            //echo "matched";
            $sql2 = "UPDATE `admin` SET `password` = '$con_pwd' WHERE `id` = '$id'";
            $rs2 = mysqli_query($con, $sql2);
            if($rs2){
                $_SESSION['change-pwd'] = "<div style=' color: #1dd1a1;'>Password Changed Successfukky</div>";
                header("Location: manage-admin.php");
            }
            else{
                $_SESSION['change-pwd'] = "<div style=' color: #ee5253;'>Password Not Changed</div>";
            header("Location: manage-admin.php");
            }
        }
        else{
            $_SESSION['pwd-not-matched'] = "<div style=' color: #ee5253;'>Password Not Matched</div>";
            header("Location: manage-admin.php");
        }
    }
    else{
        $_SESSION['user-not-found'] = "<div style=' color: #ee5253;'>User Not Found</div>";
        header("Location: manage-admin.php");
    }
}
}
?>

<div class="main-content">
    <div class="wrapper">
    <h1>Change Password</h1>
           <br/><br/>

           <?php  
           if(isset($_GET['id'])){
               $id = $_GET['id'];
           }
           ?>
           
           <form action="" method="post">
               <table class="tbl-30">
                   <tr>
                       <td>Current Password : </td>
                       <td><input type="password" name="current_password" placeholder="Current Password" ></td>
                   </tr>
                   <tr>
                       <td>New Password : </td>
                       <td><input type="password" name="new_password" placeholder="New Password"></td>
                   </tr>
                   <tr>
                       <td>Confirm Password : </td>
                       <td><input type="password" name="confirm_password" placeholder="Confirm Password"></td>
                   </tr>

                   <tr>
                       <td colspan="2">
                           <input type="hidden" name="id" value="<?php echo $id; ?>">
                           <input name="submit" type="submit" value="Change Password" class="btn-second">
                       </td>
                   </tr>

               </table>

           </form>
    </div>
</div>

<?php include("partials/footer.php"); ?>