<?php

try {
    $database = new PDO(
        "mysql:host=localhost;dbname=linkup",
        "root",
        ""
    );
} catch(PDOException $error) {
    die($error);
}