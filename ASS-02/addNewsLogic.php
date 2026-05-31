<?php
session_start();
include("connection_db.php");
if($connection->connect_error == false){
    if(isset($_POST["add_news"])){
        $title = $_POST["title"];
        $category_id = $_POST["category_id"];
        $details = $_POST["details"];
        $user_id = isset($_SESSION["authUser"]["id"])?$_SESSION["authUser"]["id"] : 1;
        $image_name = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"];
        $upload_dir = "uploads/";
        $upload_to = $upload_dir. $image_name;
        move_uploaded_file($image_tmp,$upload_to);
        $sql = "INSERT INTO news(new_title,new_details,image,id_category,id_user,status)
        VALUES('$title','$details','$image_name','$category_id','$user_id','active')";
        if($connection->query($sql) === true){
            header("Location:ShowNews.php");
            exit();
        }else{
            echo "fail";
        }
    }
}



?>