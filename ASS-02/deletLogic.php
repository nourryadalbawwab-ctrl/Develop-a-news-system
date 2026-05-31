<?php
session_start();
include("connection_db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE news SET status = 'deleted' WHERE id = '$id'";
    if ($connection->query($sql) === true) {
        header("Location: ShowNews.php");
        exit();
    } else {
        echo "Error deleting news!";
    }
}
?>