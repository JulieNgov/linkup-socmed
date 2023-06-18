<?php

require "database.php";

$requete = $database->prepare("SELECT * FROM poster ORDER BY date DESC");
$requete->execute();
$Allposts = $requete->fetch(PDO::FETCH_ASSOC);


echo json_encode($Allposts);