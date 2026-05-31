<?php
session_start();
include("connection_db.php");
$sql = "SELECT * FROM categorys ";
$result = $connection->query($sql);
echo $result->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show Category</title>
    <style>
        h1{
            color:#000080;
            font-size:35px;
        }
        a{
            text-decoration:none;
            color:blue;
        }
        a:hover{
            color:purple;
        }
        table{
            font-size:18px;
        }
    </style>
</head>
<body>
    <center>
    <h1>Show Category</h1>
    </center>
    <table border=2px width="100%">
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
        <?php
            if($result->num_rows != 0){
                while($row = $result->fetch_assoc()){
                    ?>
                        <tr>
                            <td><?php echo $row["id"]?></td>
                            <td><?php echo $row["name"]?></td>
                        </tr>
              <?php 
              }
            }
        ?>
    </table>
</body>
</html>