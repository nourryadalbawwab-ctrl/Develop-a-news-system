<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        a{
            text-decoration:none;
            color:blue;
            font-size:22px;
        }
        a:hover{
            color:purple;
        }
        h1{
            color:#000080;
            font-size:37px;
        }
    </style>
</head>
<body>
    <center>
        <h1>Welcom <?php echo $_SESSION['authUser']['name'];?> in dashboard</h1>
        <a href="addCategory.php">1.AddCategory</a>
        <br>
        <a href="showCategories.php">2.Show categories</a>
        <br>
        <a href="ShowNews.php">3.Show All News</a>
        <br>
        <a href="addNews.php">4.AddNews</a>
        <br>
        <a href="viewDeletedNew.php">5.viewDeletedNew</a>
    </center>
</body>
</html>