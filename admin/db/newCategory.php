<?php require('../../db/db_connect.php'); 

session_start();

$_SESSION["add_category_error"];
$category_name = $_POST["category_name"];
$parent_id = $_POST["parent"];
$img = $_FILES["img"];
$img_name = $img["name"];
$img_tmp_name = $img["tmp_name"];
$tag = pathinfo($img_name, PATHINFO_EXTENSION);
$new_name = $category_name . '.' . $tag;
print_r($_FILES);
echo $tag;
echo $new_name;
move_uploaded_file($img_tmp_name,  "../../Assets/CategoriesImages/$new_name");

$sql = "SELECT * FROM Category WHERE category_name='$category_name'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) != 0){
    $_SESSION["add_category_error"] = "Category already exists";
    header('location: ../newCategory.php');
}

if($parent_id == -1)
    $sql = "INSERT INTO Category (category_name, img) VALUES ('$category_name', '$new_name')";
else
    $sql = "INSERT INTO Category (category_name, parent_id, img) VALUES ('$category_name', '$parent_id', '$new_name')";
$result = mysqli_query($conn, $sql);

if($result == 1)
    header("location: ../categories.php");
else{
    $_SESSION["add_category_error"] = mysqli_error($conn);
    header("location: ../newCategory.php");
}
?>