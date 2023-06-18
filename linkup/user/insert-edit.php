<?php
session_start();
require "upload.php";

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require "db_conn.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
 
    require "database.php";

    
        $userID = $_SESSION['user_id'];

        if(!empty($_POST['pseudo']) && !empty($_POST['bio'])){ 
        $requete = $database->prepare("UPDATE myprofile SET pseudo = '".$_POST['pseudo']."', bio = '".$_POST['bio']."' WHERE id = $userID");
        $requete->execute();

        } else if(!empty($_POST['pseudo']) && empty($_POST['bio'])) {
            $requete = $database->prepare("UPDATE myprofile SET pseudo = '".$_POST['pseudo']."' WHERE id = $userID");
            $requete->execute();

        } else if(empty($_POST['pseudo']) && !empty($_POST['bio'])) {
            $requete = $database->prepare("UPDATE myprofile SET bio = '".$_POST['bio']."' WHERE id = $userID");
            $requete->execute();
        }

        header("Location: profile.php");

