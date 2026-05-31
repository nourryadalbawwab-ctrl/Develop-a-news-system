<?php
include("connection_db.php");
$sql = "SELECT * FROM categorys";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD NEWS</title>
    <style>
        label{
            color:blue;
            font-size:22px;
        }    
        h1{
            color:#000080;
            font-size:37px;
        }
        </style>
</head>
<body>
    <center>
        <h1>Add News</h1>
        <form action="addNewsLogic.php" method="post" enctype="multipart/form-data">
        <label>Title News</label>
        <br>    
        <input type="text" name="title">
        <br>
        <select name="category_id" required>
        <option value="">chosse category</option>
        <?php
        if($result && $result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option value='".$row['id']."'>".$row['name']."</option>";
            }
        }
        ?>
        </select><br>
        <label>Details New</label>
        <br>
        <textarea name="details" rows="5"cols="35" required></textarea>
        <br>
        <label>Image News</label>
        <br>
        <input type="file" name="image" accept="image/*" required>
        <br>
        <input type="submit" name="add_news" value="add_news" style=" background-color: #000080; color:#fff; font-siz:18px; width:150px; height: 40px; border:none; cursor: pointer;">
        </form>
    </center>
</body>
</html>