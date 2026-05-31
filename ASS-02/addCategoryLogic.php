<?php
include("connection_db.php");
if($connection->error==false){
    if(isset($_POST["add_category"])){
        $name = $_POST["type_category"];
        $sql = "INSERT INTO categorys(name) VALUES('$name')";
        $result = $connection->query($sql);
        if($result == true){
            header("Location:showCategories.php");
            // echo"done";
        }else{
            echo"Add opreation faild";
        }
    }
}
?>