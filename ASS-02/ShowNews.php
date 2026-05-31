<?php
session_start();
include("connection_db.php");
$sql = "SELECT news.*, categorys.name AS category_name 
        FROM news 
        LEFT JOIN categorys ON news.id_category = categorys.id 
        WHERE news.status != 'deleted' OR news.status IS NULL
        ORDER BY news.id DESC";
        
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOW NEW</title>
    <style>
        h1{
            color:#000080;
            font-size:37px;
        }
        table{
            font-size:16px;
            text-align: center;
        }
        a{
            color:blue;
            font-size:20px;
            text-decoration:none;            
        }
        a:hover{
            color:purple;
        }
    </style>
</head>
<body>
    <center>
        <h1>SHOW NEW</h1>
        <a href="addNews.php">ADD NEW</a>
        <br>
        <br>
    </center>
    <table border="2px" width="100%">
        <tr>
            <th>id</th>
            <th>title new</th>
            <th>id_category</th>
            <th>details new</th>
            <th>image new</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
            <?php
            if($result && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['new_title']; ?></td>
                    <td><?php echo $row['category_name'];?></td>
                    <td><?php echo $row['new_details']; ?></td>
                    <td>
                        <img src="uploads/<?php echo $row['image'];?>" width="80px" height="50px">
                    </td>
                    <td>
                        <a href="deletLogic.php?id=<?php echo $row['id']; ?>" style="color: red;">DELET News</a>
                    </td>
                    <td>
                        <a href="EditNew.php?id=<?php echo $row['id']; ?>" style="color: green;">Edit News</a>
                    </td>
                </tr>
                <?php
                }
            }else{
                echo "<tr><td colspan='7'><center>No news available at the moment.</center></td></tr>";
            }
            ?>
    </table>
    <br>
    <center><a href="viewDeletedNew.php">View Deleted News</a></center>
</body>
</html>