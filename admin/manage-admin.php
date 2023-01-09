<?php include("partials/menu.php") ;
session_start();
?>

<div class="main-content">
       <div class="wrapper">
           <h1>Manage Admin</h1>
           <br/>

           <?php
           if(isset($_SESSION["add"])){
               echo $_SESSION["add"];
               unset($_SESSION['add']);
           }
           if(isset($_SESSION["delete"])){
            echo $_SESSION["delete"];
            unset($_SESSION['delete']);
           }
           if(isset($_SESSION["update"])){
            echo $_SESSION["update"];
            unset($_SESSION['update']);
           }
           if(isset($_SESSION["user-not-found"])){
            echo $_SESSION["user-not-found"];
            unset($_SESSION["user-not-found"]);
           }
           if(isset($_SESSION['pwd-not-matched'] )){
               echo $_SESSION['pwd-not-matched'];
               unset($_SESSION['pwd-not-matched'] );
           }
           if(isset($_SESSION['change-pwd'] )){
            echo $_SESSION['change-pwd'] ;
            unset($_SESSION['change-pwd']  );
        }
           
           ?>
           <br/><br/>
           <a href="add-admin.php" class="btn-primay">Add Admin</a>
           <br/><br/><br/>
           <table class="tbl-full">
               <tr>
                   <th>S.No</th>
                   <th>Full Name</th>
                   <th>User Name</th>
                   <th>Actions</th>
               </tr>

               <?php

               $con = mysqli_connect('localhost', 'root', '','dreamjobs');
               $sql = "SELECT * FROM `admin`";
               $rs = mysqli_query($con, $sql);
               if($rs){
                   $rows = mysqli_num_rows($rs);
                   if($rows>0){
                       $n = 1;
                       while($rws = mysqli_fetch_assoc($rs)){
                           // getting all data
                           $id = $rws['id'];
                           $full_name = $rws['fullname'];
                           $uname = $rws['username'];

                           //display
                           ?>
                           <tr>
                               <td><?php echo $n; $n=$n+1; ?></td>
                               <td><?php echo $full_name ?></td>
                               <td><?php echo $uname ?></td>
                               <td>
                                   <a href="update-password.php?id=<?php echo $id ;?>"  class="btn-primay">Change Password</a>
                                   <a href="update-admin.php?id=<?php echo $id ;?>" class="btn-second">    Update Admin</a>
                                   <a href="delete-admin.php?id=<?php echo $id ;?>" class="btn-danger">    Delete Admin</a>
                                </td>
                            </tr>
                        <?php
                       }
                   }
                   else{
                       //no data
                       ?>
                       <p>No admins now!</p>
                       <?php
                   }
               }
               ?>
            
           </table>
       </div>
       <br/>
    <br/>    <br/>
    <br/>
    </div>
<?php include("partials/footer.php") ?>