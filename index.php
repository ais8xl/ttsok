<?php

    require_once __DIR__.'/boot.php';

    if (check_auth()) {
        header('Location: index2.php');
        die;
    }
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SOK SIA</title>
	<link rel="stylesheet" href="assets/css/main.css">
</head>
	
<body>
    <main>
        <form method="post" action="login.php">
            <h1>Login</h1>
            <?php flash(); ?>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="sok" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="sok" required>
            </div>
            <button type="submit" class="btn-login">Log In</button>
        </form>
    </main>
</body>