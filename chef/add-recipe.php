<?php
  session_start();
  $id = $_SESSION['id'];

  $recipe_name = $_POST['recipe_name'];
  $recipe_category = $_POST['recipe_category'];
  $description = $_POST['description'];
  $recipe_ingredients = $_POST['recipe_ingredients'];
  $for_people = $_POST['for_people'];
  $price = $_POST['price'];

  include_once '../dbcon.php';
  $conn = connect();

  $sql = "SELECT * FROM kitchen WHERE chef_id = '$id'";
  $result = $conn->query($sql);

  if($result->num_rows > 0){

    while($row = $result->fetch_assoc()) {
      $kitchen_id = $row['kitchen_id'];
      $location = $row['location'];

    }

$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);

$target_dir = "../img/recipe/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($fileType != "jpg" && $fileType != "jpeg" && $fileType != "png"
&& $fileType != "pdf" ) {
  echo "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfilename)) {

      $sql2 = "INSERT INTO recipe (kitchen_id, title, category, description, ingredients, for_people, location, price, file) VALUES ('$kitchen_id', '$recipe_name', '$recipe_category', '$description', '$recipe_ingredients', '$for_people', '$location', '$price', '$newfilename')";

      if ($conn->query($sql2)) {
          $_SESSION['msg_success'] = "Recipe added successfully";
          header('location:chef-recipe.php');
        }
      else {
        $_SESSION['msg_error'] = "Error occurred";
        header('location:chef-recipe.php');       
      }

  } else {
    $_SESSION['msg_error'] = "Sorry, there was an error uploading your file";
    header('location:chef-recipe.php');
  }
}

  }
  elseif ($result->num_rows == 0) {

  $_SESSION['msg_error'] = "Create your kitchen first";
  header('location:chef-recipe.php');
  exit();

  }

?>