<?php
require_once __DIR__.'/boot.php';

$sqlEditCategory = pdo()->prepare("UPDATE `categories` SET `name` = '{$_GET['Title']}', `description` = '{$_GET['Description']}' WHERE `id` = {$_GET['ID']}");
$sqlEditCategory->execute();

header('Location: index.php');