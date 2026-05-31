<?php
include("connection_db.php");
if(isset($_GET['restore_id'])){
    $restore_id = $_GET['restore_id'];
    $update_sql = "UPDATE news SET status = 'active' WHERE id = '$restore_id'";
    if($connection->query($updat_sql) === true){
        header("Location:viewDeletedNew.php");
        exit();
    }else{
        echo "The recovery operation failed";
    }
}
$sql = "SELECT news.*,categorys.name AS cat_name
FROM news
JOIN categorys ON news.id_category = categorys.id
WHERE news.status ='deleted'
ORDER BY news.id DESC";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Deleted News</title>
</head>
<body>
    <center>
        <table border=2px width=100%>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>id_category</th>
                <th>details new</th>
                <th>image new</th>
            </tr>
            <?php
            if($result && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['new_title'];?></td>
                        <td><?php echo $row['cat_name'];?></td>
                        <td><?php echo $row['new_details'];?></td>
                        <td>
                            <img src="uploads//<?php echo $row['image'];?>">
                        </td>
                    </tr>
                    <?php
                }
            }else{
                echo "<tr><td colspan='6'><center> No deleted news </center></td></tr>";
            }
            
            ?>
        </table>
    </center>
</body>
</html>