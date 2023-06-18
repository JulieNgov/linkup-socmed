<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUP / Sign up</title>
    <link rel="stylesheet" href="../landing-page/css/style.css">
</head>
<body>
    <section class="all-form">
        <h1>Sign up</h1>
        <form class="form" method="POST" action="sign-up-insert.php" novalidate>

            <div class="form">
                <label for="name">Name :</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form">
                <label for="password">Password :</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="form">
                <label for="password_confirmation">Confirm password :</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

                <button type="submit">Sign up</button>
        </form>
        <p>Have an account already? <a href="index.php">Log in</a></p>
    </section>
</body>
</html>