<?php

session_start();

require 'database.php';

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require "../user/db_conn.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

$msg = "";
if(isset($_POST['upload'])) {
    $target = "../user/img/".basename($_FILES['image']['name']);

    $insert = $database->prepare("INSERT INTO poster (user_id, contenu, tag, image) VALUES (:users, :write, :tags, :img)");
    $insert->execute(
        [
            "users" => $_SESSION["user_id"],
            "write" => $_POST['poster'],
            "tags" => $_POST['tag'],
            "img" => $_FILES['image']['name']
        ]
    );

    //Mettre l'image dans le dossier img
    //tmp_name : temporary name
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "";
    } else {
        $msg = "Uploading image failed";
    }
}
    

if(!isset($_POST['upload'])) {

    $insert = $database->prepare("INSERT INTO poster (user_id, contenu, tag, image) VALUES (:users, :write, :tags, '')");
    $insert->execute(
        [
            "users" => $_SESSION["user_id"],
            "write" => $_POST['poster'],
            "tags" => $_POST['tag']
        ]
    );
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;