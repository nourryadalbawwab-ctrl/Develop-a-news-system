<?php
session_start();
include("connection_db.php");
if (!isset($_GET['id'])) {
    header("Location: ShowNews.php");
    exit();
}
$id = $_GET['id'];
$stmt = $connection->prepare("SELECT * FROM news WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$news_item = $result->fetch_assoc();

if (!$news_item) {
    die("الخبر غير موجود!");
}
$cat_sql = "SELECT * FROM categorys";
$cat_result = $connection->query($cat_sql);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['new_title'];
    $category = $_POST['id_category'];
    $details = $_POST['new_details'];
    $image_name = $news_item['image']; 
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        $image_name = time() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }
    $update_stmt = $connection->prepare("UPDATE news SET new_title = ?, id_category = ?, new_details = ?, image = ? WHERE id = ?");
    $update_stmt->bind_param("sissi", $title, $category, $details, $image_name, $id);

    if ($update_stmt->execute()) {
        header("Location: ShowNews.php");
        exit();
    } else {
        $error = "An error occurred while editing the data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Edit News</title>
    <style>
        h1{
            color:#000080;
        }
        label{
            color:blue;
            font-size:20px;
        }
        a{
            color:blue;
            text-decoration:none;
        }
        a:hover{
            color:purple;
            font-size:20px;
        }
        button{
        background-color: #000080;
        color:#fff;
        cursor: pointer;
        width:150px;
        height: 40px;
        font-size:16px;
        border:none;
        }
    </style>
</head>
<body>
<center>
        <h1>Edit news</h1>
    
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        
        <div>
            <label>News title</label>
            <br>
            <input type="text" name="new_title" value="<?php echo htmlspecialchars($news_item['new_title']); ?>" required>
        </div>
        <br>

        <div>
            <label>News category</label>
            <br>
            <select name="id_category" required>
                <?php 
                if($cat_result && $cat_result->num_rows > 0){
                    while($cat_row = $cat_result->fetch_assoc()){

                        $selected = ($cat_row['id'] == $news_item['id_category']) ? "selected" : "";
                        echo "<option value='".$cat_row['id']."' $selected>".$cat_row['name']."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <br>

        <div>
            <label>News details</label>
            <br>
            <textarea name="new_details" rows="5" required><?php echo htmlspecialchars($news_item['new_details']); ?></textarea>
        </div>
        <br>

        <div>
            <label>Current photo  </label>
            <br>
            <img src="uploads/<?php echo $news_item['image']; ?>" width="120px" height="80px">
            <br><br>
            <label>Upload a new image</label>
            <br>
            <input type="file" name="image">
        </div>
        <br>

        <button type="submit">Save modifications</button>
        <br>
        <a href="ShowNews.php">Cancel</a>

    </form>
</center>


</body>
</html>