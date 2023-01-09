<?php 
include("partials/menu.php") ;
session_start();
?>
<?php

if(isset($_POST['title'])){
    $con = mysqli_connect('localhost', 'root', '','dreamjobs');

    $title = $_POST['title'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    print_r($_FILES['image']);
    echo "uploads/".$_FILES["image"]["name"];
    if(isset($_FILES["image"])){
        echo "11";
        $img_name = $_FILES["image"]["name"];
        $source_path = $_FILES["image"]["tmp_name"];
        $destination_path = "../images/category/".$img_name;
        echo $source_path;
        echo $img_name;
        echo $destination_path;

        $upload = move_uploaded_file($source_path,"uploads/".$_FILES["image"]["name"]);

        if($upload==false){
            $_SESSION["upload"] = "<div style='color: #ee5253;'>Failed to upload image.</div>";
            //echo $_SESSION['c-add'];
            header("Location: add-category.php");
            die();
        }
    }
    else{
        $img_name = "";
    }

    $sql1 = "INSERT INTO `category` (`title`,`image_name`, `featured`, `active`) VALUES ('$title','$img_name', '$featured', '$active')";
    //echo $sql1;
    $rs1 = mysqli_query($con, $sql1);
    //echo $sql1;

    if($rs1){
        $_SESSION['c-add'] = "<div style='color: #1dd1a1;'>Category added successfully</div>";
        //echo $_SESSION['c-add'];
        //header("Location: manage-category.php");
    }
    
    else{
    $_SESSION['c-add'] = "<div style='color: #ee5253;'>Failed to add Category</div>";
    header("Location: add-category.php");
}
}



?>

<link rel="stylesheet" href="../css/admin.css">
    <div class="main-content">
       <div class="wrapper">
           <h1>Add Category</h1>

           <br/><br/>
           <?php
           if(isset($_SESSION["c-add"])){
               echo $_SESSION["c-add"];
               //unset($_SESSION['c-add']);
           }
           if(isset($_SESSION["upload"])){
            echo $_SESSION["upload"];
            unset($_SESSION['upload']);
        }
           
           ?>

           <form action="add-category.php" method="post" enctype="multipart/form-data">
               <table class="tbl-30">
                   <tr>
                       <td>Title : </td>
                       <td><input type="text" name="title" placeholder="Enter title"></td>
                   </tr>
                   <tr>
                       <td>Select Image:</td>
                       <td>
                           <input type="file" name="image">
                       </td>
                   </tr>
                   <tr>

                       <td>Featured : </td>
                       <td>
                           <input type="radio" name="featured" value='Yes'>Yes
                           <input type="radio" name="featured" value='No'>No
                       </td>
                   </tr>
                   <tr>
                       <td>Active : </td>
                       <td>
                       <input type="radio" name="active" value='Yes'>Yes
                       <input type="radio" name="active" value='No'>No
                       </td>
                   </tr>
                   <tr>
                       <td colspan="2">
                           <input name='submit' type="submit" value="Add Category" class="btn-second">
                       </td>
                   </tr>

               </table>

           </form>

       </div>
    </div>
<?php include("partials/footer.php") ?>
