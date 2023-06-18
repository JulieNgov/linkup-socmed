<?php

require 'database.php';
$supp = $database->prepare("DELETE FROM poster WHERE id = :id");
$supp->execute(
    [
        "id" => $_POST['supp']
    ]
);

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;