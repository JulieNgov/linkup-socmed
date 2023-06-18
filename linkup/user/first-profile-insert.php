<?php

require 'database.php';
$insert = $database->prepare("INSERT INTO myprofile (pseudo, bio, file) VALUES ('pseudo', 'Write a bio here', 'default-pfp.jpg')");
$insert->execute();

header("Location: index.php");