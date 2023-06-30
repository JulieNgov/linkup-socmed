<?php

//Commencer ou load une session existante
session_start();

//isset : inverse de empty
if (isset($_SESSION["user_id"])) {
    
    $mysqli = require "db_conn.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

}

require "database.php";

$userID = $_SESSION['user_id'];

//Postes
$requete = $database->prepare("SELECT * FROM poster WHERE user_id = $userID ORDER BY date DESC");
$requete->execute();
$Allposts = $requete->fetchAll(PDO::FETCH_ASSOC);

//Tags
$requete = $database->prepare("SELECT * FROM tags");
$requete->execute();
$AllTags = $requete->fetchAll(PDO::FETCH_ASSOC);

//Profile
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
            <!-- Side-bar (gauche) -->
            <section id="side-bar">
                <div class="logo">
                    <h2 class="logo">LinkUP</h2>
                </div>
                <div class="propriete">
                    <p><i class="fa-solid fa-house"></i><a href="home.php?search=">Home</a></p>
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
                <div class="propriete">
                    <p><i class="fa-solid fa-house"></i><a href="home.php?search=">Home</a></p>
                    <p><i class="fa-solid fa-user-pen"></i><a href="edit.php">Edit Profile</a></p>
                    <p><i class="fa-solid fa-right-from-bracket"></i><a href="logout.php">Log out</a></p>
                    <p><i class="fa-solid fa-gear"></i><a href="#">Settings</a></p>
                </div>
            </section>

            <!-- TimeLine -->
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

                <!--Tags mobile-->
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

                <?php foreach($Allposts as $posts){ ?>
                    <?php foreach($FullProfile as $edit) { ?>
                        <article class="post-content">
                        <div class="filterDiv <?= $posts['tag'] ?>">
                        <section class="post">
                            <div class="img-pfp">
                                <img src="img/<?= $edit['file'] ?>" alt="">
                            </div>
                        <section class="main-post">
                            <div class="name">
                                <div class="name">
                                    <h2><?= $edit['pseudo']; ?></h2>
                                    <p>@<?= $user["name"]; ?></p>
                                </div>
                                <div class="date">
                                    <p><?= date($posts['date']) ?></p>
                                </div>
                            </div>
                    <?php } ?>

                        <div class="text-post">
                            <p><?= $posts['contenu'] ?></p>
                        </div>

                        <div class="img-post">
                            <?php if(!empty($posts['image'])) { ?>
                            <img src="img/<?= $posts['image'] ?>" alt="image">
                            <?php } ?>
                        </div>
                        </section>
                        </section>

                    <div class="icons-post">
                        <div class="icon-post">
                            <p class="heart"><i class="fa-solid fa-heart"></i><a href="#">0</a></p>
                            <p class="comment"><i class="fa-sharp fa-solid fa-comment"></i><a href="#">0</a></p>
                            <div class="container">
                                <button class="btn-posts"><?= $posts['tag'] ?></button>
                            </div>
                        </div>
                        <div class="trash">
                            <a href="#"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>

                    <form action="../landing-page/delete.php" method="POST" id="delete">
                        <h1>Delete post?</h1>
                        <input type="hidden" name="supp" value="<?= $posts['id'] ?>">
                        <button type="submit">Yes</button>
                        <button type="button" class="nosupp">No</button>
                    </form>
                        </div>
                        </article>
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
        <!-- Ecrire text -->
        <form class="form" method="POST" action="../landing-page/insert-post.php" enctype="multipart/form-data">
            <input type="text" name="poster" value="<?= htmlspecialchars($_POST["contenu"] ?? "") ?>" placeholder="What's up?" required>
            <!-- Choose Tag -->
            <div class="tags">
                <label for="tags">Tags</label>
                <select name="tag" class="form-control">
                    <option value="">Select a tag</option>
                    <?php foreach($AllTags as $tag) { ?>
                        <option value="<?= $tag['tag'] ?>"><?= $tag['tag'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="bottom-post">
                <!-- Upload Img -->
                <input type="hidden" name="size" value="200000">
                <input type="file" name="image" accept="image/jpg,image/png,image/jpeg,image/gif,">

                <p><a href="#"><i class="fa-solid fa-image"></i></a></p>
                <div class="buttons">
                    <button type="submit" name="upload">Post</button>
                    <button type="button" onclick="closePost();">Cancel</button>
                </div>
            </div>            
        </form>
    </section>

    <?php }else{ ?>
        
        <p><a href="index.php">Log in</a> or <a href="signup.php">Sign up</a></p>
        
    <?php }; ?>


    <script src="../landing-page/java.js"></script>
    <script src="java.js"></script>
</body>
</html>

