<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require "db_conn.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUP / Edit</title>
    <link rel="stylesheet" href="../landing-page/css/style.css">

<body>

<?php if (isset($user)){ ?>

    <section class="all-form">
        <h1>Edit profile</h1>
        <form method="POST" action="insert-edit.php">
            <div class="form">
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
            </div>

            <div class="form">
                <label for="bio">Bio :</label>
                <input type="text" name="bio" id="bio" placeholder="Bio">
            </div>
        
            <button type="submit">Submit</button>
        </form>

        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form">
            <label for="file">Upload profile picture :</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <button type="submit">Submit image</button>
            </div>
        </form>

        <a href="profile.php">Return to profile</a>
    </section>

<?php }else{ ?>
        
    <p><a href="index.php">Log in</a> or <a href="signup.php">sign up</a></p>
        
<?php }; ?>

</body>
</html>

<?php

?>