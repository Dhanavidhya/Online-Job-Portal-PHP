<?php
session_start();
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
    background-image: url("https://wallpaperaccess.com/full/1177739.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    font-family: "Open Sans", sans-serif;
        }
        .content{
            color: #B0B3B9;
            text-align:center;
            padding:10px;
            margin: 10px;
        }
    </style>
    <title>Success</title>
</head>
<body>
<div class="container">
        <div class="content">
            <h2>Successfully Created Job Post !</h2>
            <?php
            echo $id;
            if($id=="admin"){
                ?>
                <h3><a href="../admin/manage-jobs.php">Click here to proceed</a></h3>
                <?php
            }
            else{
                ?>
                <h3><a href="../companylogin.php?cid=<?php echo $id ?>">Click here to proceed</a></h3>
                <?php

            }
            
            ?>
            
        </div>
      </div>
</body>
</html>