<?php include("partials/menu.php") ;
session_start();
$did  = '5555';
?>
    <div class="main-content">
       <div class="wrapper">
           <h1>Manage Jobs</h1>
           <br/><br/>
           <a href="add-job.php" class="btn-primay">Add Job</a>
           <br/><br/><br/>
           <?php
           if(isset($_SESSION["add"])){
               echo $_SESSION["add"];
               unset($_SESSION['add']);
           }
           if(isset($_SESSION["delete"])){
            echo $_SESSION["delete"];
            unset($_SESSION['delete']);
           }
           ?>
           <table class="tbl-full">
               <tr>
                   <th>S.No</th>
                   <th>Company</th>
                   <th>Job Title</th>
                   <th>Salary</th>
                   <th>Experience</th>
                   <th>Vacancy</th>
               </tr>

               <?php

               $con = mysqli_connect('localhost', 'root', '','JobPortal');
               $sql = "SELECT * FROM `job`";
               $rs = mysqli_query($con, $sql);
               if($rs){
                   $rows = mysqli_num_rows($rs);
                   if($rows>0){
                       $n = 1;
                       while($rws = mysqli_fetch_assoc($rs)){
                           $cmp =  "SELECT * FROM `company`";
                           $qry = mysqli_query($con,$cmp);
                           foreach ($qry as $q ) {      
                                if($q['comp_id']==$rws['comp_id']){
                                    $dd = $q['comp_name'];
                                }
                                elseif ($rws['comp_id']=="admin") {
                                    # code...
                                    $dd = "Admin";
                                }
                            }

                           // getting all data
                           $id = $rws['job_id'];
                           $full_name = $rws['title'];
                           $sal = $rws['salary'];
                           $exp = $rws['experience'];
                           $vac = $rws['vacancy'];

                           //display
                           ?>
                           <tr>
                               <td><?php echo $n; $n=$n+1; ?></td>
                               <td><?php echo $dd ?></td>
                               <td><?php echo $full_name ?></td>
                               <td><?php echo $sal ?></td>
                               <td><?php echo $exp ?></td>
                               <td><?php echo $vac ?></td>
                               <td>
                                   <a href="delete-job.php?id=<?php echo $id ;?>" class="btn-danger">Delete Job</a>
                                </td>
                            </tr>
                        <?php
                       }
                   }
                   else{
                       //no data
                       ?>
                       <p>No Jobs now!</p>
                       <?php
                   }
               }
               ?>
            
           </table>
           
       </div>
       <br/>
    <br/>    <br/>
    <br/><br/>
    </div>
    
<?php include("partials/footer.php") ?>