<?php include("partials/menu.php") ;
session_start();
?>

<?php
if(isset($_POST["username"])){

$con = mysqli_connect('localhost', 'root', '','dreamjobs');

$fullname = $_POST["full_name"];
$user = $_POST["username"]; 
$passwd = md5($_POST["password"]);

$sql1 = "INSERT INTO `admin` (`fullname`, `username`, `password`) VALUES ('$fullname', '$user', '$passwd')";
$rs1 = mysqli_query($con, $sql1);
if($rs1){
    $_SESSION['add'] = "<div style=' color: #1dd1a1;'>Admin added successfully</div>";
    header("Location: manage-admin.php");
}
else{
    $_SESSION['add'] = "<div style='color: #ee5253;'>Failed to add Admin</div>";
    header("Location: add-admin.php");
}
}
?>
<link rel="stylesheet" href="../css/admin.css">
    <div class="main-content">
       <div class="wrapper">
           <h1>Add Admin</h1>

           <br/><br/>
           <?php
           if(isset($_SESSION["add"])){
               echo $_SESSION["add"];
               //unset($_SESSION['add']);
           }
           
           ?>

           <form action="add-admin.php" method="post">
               <table class="tbl-30">
                   <tr>
                       <td>Full Name : </td>
                       <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                   </tr>
                   <tr>
                       <td>User Name : </td>
                       <td><input type="text" name="username" placeholder="Enter user name"></td>
                   </tr>
                   <tr>
                       <td>Password : </td>
                       <td><input type="password" name="password" placeholder="Enter password"></td>
                   </tr>
                   <tr>
                       <td colspan="2">
                           <input type="submit" value="Add Admin" class="btn-second">
                       </td>
                   </tr>

               </table>

           </form>

       </div>
    </div>
<?php include("partials/footer.php") ?>
