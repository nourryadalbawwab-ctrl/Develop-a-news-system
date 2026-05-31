<?php
include("connection_db.php");
if($connection->error==false){
    if(isset($_POST["creat_acount"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"],PASSWORD_BCRYPT);
    $sql = "INSERT INTO users(name,email,password) 
            VALUES('$name','$email','$password')";
    $result = $connection->query($sql);
    if($result == true){
        header("Location:logIn.php?statusCode=201");
    }else{
        echo "fail";
    }        
}
}



?>