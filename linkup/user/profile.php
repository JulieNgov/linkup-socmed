<?php

session_start();
if (isset($_SESSION["user_id"])) {
    
    $mysqli = require "db_conn.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

}

require "database.php";
$userID = $_SESSION['user_id'];

$requete = $database->prepare("SELECT * FROM poster WHERE user_id = $userID ORDER BY date DESC");
$requete->execute();
$Allposts = $requete->fetchAll(PDO::FETCH_ASSOC);

$requete = $database->prepare("SELECT * FROM tags");
$requete->execute();
$AllTags = $requete->fetchAll(PDO::FETCH_ASSOC);

$requete = $database->prepare("SELECT * FROM myprofile WHERE id = $userID");
$requete->execute();
$FullProfile = $requete->fetchAll(PDO::FETCH_ASSOC);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUP / <?= $user["name"] ?></title>
    <link rel="stylesheet" href="../landing-page/css/style.css">
    <script src="https://kit.fontawesome.com/d46d8a5065.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
</head>
<body>

<main>

    <?php if (isset($user)){ ?>
    <!-- Side-bar -->
        <section id="side-bar">
            <div class="logo">
                <h2 class="logo">LinkUP</h2>
            </div>
            <form action="" class="search">
                <input type="search" name="search" placeholder="Search post">
                <button type="submit">Search</button>
            </form>
            <div class="propriete">
                <p><i class="fa-solid fa-house"></i><a href="home.php">Home</a></p>
                <p><i class="fa-solid fa-user-pen"></i><a href="edit.php" onclick="openEdit();">Edit Profile</a></p>
                <p><i class="fa-solid fa-right-from-bracket"></i><a href="logout.php">Log out</a></p>
                <p><i class="fa-solid fa-gear"></i><a href="#">Settings</a></p>
            </div>
        </section>

        <div class="barre">
            <a href="#" onclick="NavMenu()"><i class="fa-solid fa-bars"></i></a>
        </div>

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
                <p><i class="fa-solid fa-house"></i><a href="home.php">Home</a></p>
                <p><i class="fa-solid fa-user-pen"></i><a href="edit.php">Edit Profile</a></p>
                <p><i class="fa-solid fa-right-from-bracket"></i><a href="logout.php">Log out</a></p>
                <p><i class="fa-solid fa-gear"></i><a href="#">Settings</a></p>
            </div>
        </section>

        <section class="time-line">

        <!--Layout-->
        <section class="profile">
            <?php foreach($FullProfile as $edit) { ?>
                <div class="img">
                    <img id="header" src="img/header.png" alt="header">
                    <img id="icon" src="img/<?= $edit['file'] ?>" alt="pfp">
                </div>
                
                <div class="name">
                    <h2><?= $edit['pseudo']; ?></h2>
                    <p>@<?= $user["name"]; ?></p>
                </div>
                <div class="bio">
                    <p><?=$edit['bio']; ?></p>
                </div>
            <?php } ?>
            <div class="follow">
                <a href="#">0 Following</a>
                <a href="#">0 Followers</a>
            </div>
        </section>

            <section class="AllTags-mobile">
                <h2>Search by tags</h2>
                <div class="tags">
                    <button class="btn" id="all">All</button>
                    <?php foreach($AllTags as $tag) { ?>
                        <button class="btn" id="<?= $tag['tag'] ?>"><?= $tag['tag'] ?></button>
                    <?php } ?>
                    <form class="form" method="POST" action="tags.php">
                        <input class="tags" type="text" name="tag" placeholder="New tag">
                    </form>
                </div>
            </section>

            <?php foreach($Allposts as $posts){ ?>
                <?php foreach($FullProfile as $edit) { ?>
                <section class="post">
                    <div class="img-pfp">
                        <img src="img/<?= $edit['file'] ?>" alt="">
                    </div>
                    <section class="main-post">
                        <div class="name">
                            <h2><?= $edit['pseudo']; ?></h2>
                            <p>@<?= $user["name"]; ?></p>
                        </div>
                <?php } ?>

                        <div class="text-post">
                            <p><?= $posts['contenu'] ?></p>
                        </div>

                        <div class="img-post">
                            <img src="https://fastly.picsum.photos/id/1064/200/200.jpg?hmac=xUH-ovzKEHg51S8vchfOZNAOcHB6b1TI_HzthmqvcWU" alt="image">
                        </div>
                    </section>
                </section>

                <div class="icons-post">
                    <div class="icon-post">
                        <p class="heart"><i class="fa-solid fa-heart"></i><a href="#">0</a></p>
                        <p class="comment"><i class="fa-sharp fa-solid fa-comment"></i><a href="#">0</a></p>
                        <button class="btn">Divers</button>
                    </div>
                    <div class="trash">
                        <a href="#" onclick="document.getElementById('id01').style.display='block'"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>

                <form action="../landing-page/delete.php" method="POST" id="delete">
                    <h1>Delete post?</h1>
                    <input type="hidden" name="supp" value="<?= $posts['id'] ?>">
                    <button type="submit">Yes</button>
                    <button type="button" onclick="closePopup()">No</button>
                </form>
            <?php } ?>
        </section>

        <section class="AllTags">
            <h2>Search by tags</h2>
            <div class="tags">
                <button class="btn" id="all">All</button>
                <?php foreach($AllTags as $tag) { ?>
                    <button class="btn" id="<?= $tag['tag'] ?>"><?= $tag['tag'] ?></button>
                <?php } ?>
                <form class="form" method="POST" action="../landing-page/tags.php">
                    <input class="tags" type="text" name="tag" placeholder="New tag">
                </form>
            </div>
        </section>

    </main>

<!-- Bouton poster -->
    <p class="floating-button">
        <a href="#" onclick="openPost();"><i class="fa-solid fa-pen"></i></a>
    </p>



<!--Forme pour faire un poste-->
    <section class="make-post" id="make-post">
        <h2 class="title-post">Make a post</h2>
        <form class="form" method="POST" action="../landing-page/insert-post.php">
            <input type="text" name="poster" value="<?= htmlspecialchars($_POST["contenu"] ?? "") ?>" placeholder="What's up?" required>
            
            <div class="tags">
                <?php foreach($AllTags as $tag) { ?>
                <button type="button" class="btn" id="<?= $tag['tag'] ?>"><?= $tag['tag'] ?></button>
                <?php } ?>
            </div>

            <div class="bottom-post">
                <p><a href="#"><i class="fa-solid fa-image"></i></a></p>
                <div class="buttons">
                    <button type="submit">Post</button>
                    <button type="button" onclick="closePost();">Cancel</button>
                </div>
            </div>
            
        </form>
    </section>

    <?php }else{ ?>
        
        <p><a href="index.php">Log in</a> or <a href="signup.php">sign up</a></p>
        
    <?php }; ?>


    <script src="../landing-page/java.js"></script>
    <script src="java.js"></script>
</body>
</html>

