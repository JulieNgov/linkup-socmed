<?php

//Password verification
//8 characters max
//strlen : string length
if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

//One letter min
if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

//One number min
//preg_match : retourne s'il y a similitude dans un string
if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

//Password = password confirmation
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

//Password security - Met des chiffres et nombres random à la place du mdp
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require "db_conn.php";

$sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

//Voir s'il y a une erreur dans le sql lorsqu'on prepare
if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}


$stmt->bind_param("sss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash);
                  
if ($stmt->execute()) {

    header("Location: first-profile-insert.php");
    exit;
    
} else {
    //Mettre un message si un email existe déjà
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}