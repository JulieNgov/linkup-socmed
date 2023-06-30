<?php

require "database.php";

//Tags
$requete = $database->prepare("SELECT * FROM tags");
$requete->execute();
$AllTags = $requete->fetchAll(PDO::FETCH_ASSOC);

//Postes
$requete = $database->prepare("SELECT poster.id, poster.contenu, poster.tag, poster.image, poster.date, myprofile.pseudo, myprofile.bio, myprofile.file, user.name
                                FROM poster
                                INNER JOIN myprofile ON poster.user_id = myprofile.id
                                INNER JOIN user ON poster.user_id = user.id
                                ORDER BY poster.date DESC");
$requete->execute();
$Allposts = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linkup</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/d46d8a5065.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Pop up -->
    <div class="modal" id="modal">
        <div class="modal-back"></div>
        <div class="modal-container">
            <p><a href="../user/signup.php">Sign up</a> or <a href="../user/index.php">Log in</a> to see more</p>
        </div>
    </div>

    <main>
        <!-- Side-bar -->
        <section id="side-bar">
            <div class="logo">
                <h2 class="logo">LinkUP</h2>
            </div>
            <div class="propriete">
                <p><i class="fa-solid fa-right-to-bracket"></i><a href="../user/signup.php">Sign up</a></p>
                <p><i class="fa-solid fa-right-from-bracket"></i><a href="../user/index.php">Log in</a></p>
                <p><i class="fa-solid fa-gear"></i><a href="#">Settings</a></p>
            </div>
        </section>

        <div class="barre">
            <a href="#" onclick="NavMenu()"><i class="fa-solid fa-bars"></i></a>
        </div>

        <!-- Side-bar mobile -->
        <section id="side-bar-mobile">
            <div class="logo">
                <a href="#" onclick="NavMenu()"><i class="fa-solid fa-bars"></i></a>
                <h2 class="logo">LinkUP</h2>
            </div>
            <form action="" class="search">
                <input type="search" name="search" placeholder="Search post">
                <button type="submit">Search</button>
            </form>
            <div class="propriete">
                <p><i class="fa-solid fa-right-to-bracket"></i><a href="../user/signup.php">Sign up</a></p>
                <p><i class="fa-solid fa-right-from-bracket"></i><a href="../user/index.php">Log in</a></p>
                <p><i class="fa-solid fa-gear"></i><a href="#">Settings</a></p>
            </div>
        </section>

        <!-- TIME LINE -->
        <section class="time-line">
            <!-- Tags mobile -->   
            <section class="AllTags-mobile">
                <h2>Search by tags</h2>
                <div class="tags">
                    <div id="myBtnContainerMobile">
                        <button class="btn active" onclick="filterSelection('all')">All</button>
                        <?php foreach($AllTags as $tag) { ?>
                            <button class="btn" onclick="filterSelection('<?= $tag['tag'] ?>')"><?= $tag['tag'] ?></button>
                        <?php } ?>
                    </div>
                </div>
            </section>
            
            <!-- Postes -->
            <?php foreach($Allposts as $posts){ ?>
                <div class="filterDiv <?= $posts['tag'] ?>">
                    <section class="post">
                        <div class="img-pfp">
                            <img src="../user/img/<?= $posts['file'] ?>" alt="pfp">
                        </div>
                        <section class="main-post">
                            <div class="name">
                                <h2><?= $posts['pseudo'] ?></h2>
                                <p><?= $posts['name'] ?></p>
                            </div>

                            <div class="text-post">
                                <p><?= $posts['contenu'] ?></p>
                            </div>

                            <div class="img-post">
                                <?php if(!empty($posts['image'])) { ?>
                                    <img src="../user/img/<?= $posts['image'] ?>" alt="image">
                                <?php } ?>
                            </div>
                        </section>
                    </section>

                    <div class="icons-post">
                        <div class="icon-post">
                            <p class="heart"><i class="fa-solid fa-heart"></i><a href="#">0</a></p>
                            <p class="comment"><i class="fa-sharp fa-solid fa-comment"></i><a href="#">0</a></p>
                            <div class="container">
                                <button class="btn"><?= $posts['tag'] ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </section>

        <section class="AllTags">
            <h2>Search by tags</h2>
            <div class="tags">
                <div id="myBtnContainer">
                    <button class="btn active" onclick="filterSelection('all')">All</button>
                    <?php foreach($AllTags as $tag) { ?>
                        <button class="btn" onclick="filterSelection('<?= $tag['tag'] ?>')"><?= $tag['tag'] ?></button>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>

    <script src="java.js"></script>
    <script src="../user/java.js"></script>
</body>
</html>