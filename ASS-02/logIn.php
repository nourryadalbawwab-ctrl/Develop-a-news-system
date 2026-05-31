<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In page</title>
    <style>
        h1{
            color:#000080;
            font-size:37px;
        }
    </style>
</head>
<body>
    <center>
        <h1>Welcom Log In Page</h1>
        <?php
        if(isset($_GET["statusCode"])){
            if($_GET["statusCode"]=="201"){
                echo"<b>Acount creted</b>";
            }
        }
        ?>
        <form action="logIn_logic.php"method="post">
            <input type="email" name="email" placeholder="email">
            <br>
            <input type="password" name="password" placeholder="password">
            <br>
            <input type="submit" name="login" value="login">
        </form>
        <a href="creatAcount.php">creat acount</a>
    </center>
</body>
</html>