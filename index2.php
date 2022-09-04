<?php

require_once __DIR__.'/boot.php';
require_once __DIR__.'/tree.php';

$user = null;

if (check_auth()) {
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminDesk SOK SIA</title>
	<link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <main>
        <?php if ($user) { ?>
            <h1 class="welcome">Welcome back, <?=htmlspecialchars($user['username'])?>!</h1>
            
            <?=build_tree($categories, 0);?>

            <?php } else { 
            header('Location: index.php');
            die;
        } ?>

        <form method="get" action="editCategory.php">
            <div class="container">
                <h1>Edit</h1>
                <div>
                    <label>Name:</label>
                    <input type="text" name="Title">
                </div>
                <div>
                    <label>ID:</label>
                    <input type="text" name="ID" value="<?= isset($_GET['edit']) ? $_GET['edit'] : '';?>">
                </div>
                <div>
                    <label>Description:</label>
                    <input type="text" name="Description">
                </div>
                <button type="submit" class="btn-OK">OK</button>
            </div>
        </form>

        <form method="post" action="addCategory.php">
            <div class="container">
                <h1>Add</h1>
                <div>
                    <label>Name:</label>
                    <input type="text" name="Title" required>
                </div>
                <div>
                    <label>ID:</label>
                    <input type="text" name="Parent_id" required>
                </div>
                <div>
                    <label>Description:</label>
                    <input type="text" name="Description">
                </div>
                <button type="submit" class="btn-OK">OK</button>
            </div>
        </form>

        <form method="post" action="logout.php" class="logout">
            <button type="submit" class="btn-logout">Log Out</button>
        </form>
    </main>
</body>