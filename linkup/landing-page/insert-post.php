<?php
session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require "../user/db_conn.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

require 'database.php';
$insert = $database->prepare("INSERT INTO poster (user_id, contenu) VALUES (:users, :write)");
$insert->execute(
    [
        "users" => $_SESSION["user_id"],
        "write" => $_POST['poster']
    ]
);


header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;