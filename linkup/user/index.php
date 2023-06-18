<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require "db_conn.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: profile.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUP / Log in</title>
    <link rel="stylesheet" href="../landing-page/css/style.css">
</head>
<body>
    <section class="all-form">
        <h1>Log in</h1>

        <?php if ($is_invalid): ?>
            <em>Invalid login</em>
        <?php endif; ?>
    
        <form method="POST">
            <div class="form">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email"
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                    <!-- Garde le email lorsque password est faux -->
            </div>
            
            <div class="form">
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit">Log in</button>
        </form>

        <p>Don't have an account? <a href="signup.php">Sign in</a></p>
    </section>
</body>
</html>