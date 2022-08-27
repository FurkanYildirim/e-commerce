<?php
require_once('db.php');
if(!isset($_SESSION['email']))
{
  header('location: ./login.php');
}

///     ADD CATEGORY    ///

if(isset($_POST['add_category'])){
    $cat_name = $_POST['cat_name'];

    if(empty($cat_name)){
        header("location: ../categories.php?error=CategoryNameRequire");
    }
    else{
        $query = "INSERT INTO `categories` (`cat_name`) VALUES ('$cat_name')"; 
        if(mysqli_query($conn, $query)){
            header("location: ../categories.php?success=CategoryHasBeenAdded");
        }
        else{
            header("location: ../categories.php?error=ThisCategoryAlreadyExist");
        }
    }
}


///     UPDATE CATEGORY     ///


if(isset($_POST['update_category'])){
    $edit_id = $_GET['update_category'];
    $up_cat_name = $_POST['up_cat_name'];


    if(empty($up_cat_name)){
        header("location: ../categories.php?uperror=CategoryNameRequire&edit=$edit_id");
    }
    else{
        $query = "UPDATE `categories` SET `cat_name` = '$up_cat_name' WHERE `cat_id` = $edit_id";
        if(mysqli_query($conn, $query)){
            header("location: ../categories.php?upsuccess=CategoryHasBeenAdded&edit=$edit_id");
        }
        else{
            header("location: ../categories.php?uperror=ThisCategoryAlreadyExist&edit=$edit_id");
        }
    }
}
















?>