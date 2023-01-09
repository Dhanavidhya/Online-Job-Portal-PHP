<?php 
include("partials/menu.php") ;
session_start();
?>
<?php
if(isset($_POST["submit"])){
    echo "clicked";

    $con = mysqli_connect('localhost', 'root', '','dreamjobs');
    $id = $_POST['id'];
    $fullname = $_POST['full_name'];
    $user = $_POST['username'];
    //echo "---";

    $sql1 = "UPDATE `admin` SET `fullname` = '$fullname',`username` = '$user' WHERE `id`='$id'";
    echo $sql1;
    $rs1 = mysqli_query($con, $sql1);
    
    if($rs1){
        echo "up";
        $_SESSION['update'] = "<div style=' color: #1dd1a1;'>Admin Updated successfully</div>";
        header("Location: manage-admin.php");
    }
    else{
        $_SESSION['update'] = "<div style='color: #ee5253;'>Failed To Update Admin</div>";
        header("Location: manage-admin.php");
    }
}
?>

<div class="main-content">
    <div class="wrapper">
    <h1>Update Admin</h1>
           <br/><br/>

           <?php
           
            $id = $_GET['id'];

            $con = mysqli_connect('localhost', 'root', '','dreamjobs');
            $sql = "SELECT * FROM `admin` WHERE `id` = '$id'";
            $rs = mysqli_query($con, $sql);
            if($rs){
                $rows = mysqli_num_rows($rs);
                if($rows==1){
                    //echo "Avail";
                    $rws = mysqli_fetch_assoc($rs);
                    $id = $rws['id'];
                    $full_name = $rws['fullname'];
                    $uname = $rws['username'];
                    //echo "22";
                }
                else{
                    header("Location: manage-admin.php");
                }
           
            }
           ?>
           
           <form action="" method="post">
               <table class="tbl-30">
                   <tr>
                       <td>Full Name : </td>
                       <td><input type="text" name="full_name" value="<?php echo $full_name ?>" ></td>
                   </tr>
                   <tr>
                       <td>User Name : </td>
                       <td><input type="text" name="username" value="<?php echo $uname ?>"></td>
                   </tr>

                   <tr>
                       <td colspan="2">
                           <input type="hidden" name="id" value="<?php echo $id ?>">
                           <input name="submit" type="submit" value="Update Admin" class="btn-second">
                       </td>
                   </tr>

               </table>

           </form>
    </div>
</div>

<?php include("partials/footer.php"); ?>