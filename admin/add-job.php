<?php include("partials/menu.php") ;
session_start();
?>

<?php
if(isset($_POST["title"])){
    $con = mysqli_connect('localhost', 'root', '','JobPortal');

    $title = $_POST['title'];
    $location = $_POST['location'];
    $qualification = $_POST['qualification'];
    $experience = $_POST['experience'];
    $salary =  $_POST['salary'];
    $vacancy =  $_POST['vacancy'];
    
    $sql = "INSERT INTO `job` ( `comp_id`, `title`, `location`, `qualification`, `experience`, `salary`, `vacancy`) VALUES ('admin', '$title', '$location','$qualification','$experience', '$salary','$vacancy')";

    $rs1 = mysqli_query($con, $sql);
if($rs1){
    $_SESSION['add'] = "<div style=' color: #1dd1a1;'>Job added successfully</div>";
    header("Location: manage-jobs.php");
}
else{
    $_SESSION['add'] = "<div style='color: #ee5253;'>Failed to add Job</div>";

    //echo $sql;
    header("Location: add-job.php");
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

           <form action="add-job.php" method="post">
               <table class="tbl-30">
                   <tr>
                       <td>Title : </td>
                       <td>
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
                       </td>
                   </tr>
                   <tr>
                       <td>Location : </td>
                       <td><input type="text" name="location" id="location" placeholder="Enter location of job" required>
</td>
                   </tr>
                   <tr>
                       <td>Qualification : </td>
                       <td>
                       <input type="text" name="qualification" id="qualification" placeholder="Enter qualification" required>
                       </td>
                   </tr>
                   <tr>
                       <td>Salary : </td>
                       <td>
                       <input type="text" name="salary" id="salary" placeholder="Enter salary" required>
                       </td>
                   </tr>
                   <tr>
                       <td>Experience : </td>
                       <td>
                       <input type="text" name="experience" id="experience" placeholder="Enter needed experience" required>
                       </td>
                   </tr>
                   <tr>
                       <td>Vacancy : </td>
                       <td>
                       <input type="text" name="vacancy" id="vacancy" placeholder="Enter vacancy" required>
                       </td>
                   </tr>
                   <tr>
                       <td colspan="2">
                           <input type="submit" value="Add Job" class="btn-second">
                       </td>
                   </tr>

               </table>

           </form>

       </div>
    </div>
<?php include("partials/footer.php") ?>
