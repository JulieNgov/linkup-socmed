<?php

require 'database.php';
$insert = $database->prepare("INSERT INTO tags (tag) VALUES (:tags)");
$insert->execute(
    [
        "tags" => $_POST['tag']
    ]
);


header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;