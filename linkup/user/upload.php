<?php
session_start();

require "database.php";
$userID = $_SESSION['user_id'];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $requete = $database->prepare("UPDATE myprofile SET file = '".$_FILES["fileToUpload"]["name"]."' WHERE id = $userID");
    $requete->execute();
    header("Location: profile.php");

} else {
    echo "Sorry, there was an error uploading your file.";
  }
}

