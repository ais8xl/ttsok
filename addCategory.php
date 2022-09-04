<?php
require_once __DIR__.'/boot.php';

$sqlAddCategory = pdo()->prepare("INSERT INTO `categories` (`name`, `parent_id`, `description`) VALUES ('{$_POST['Title']}', '{$_POST['Parent_id']}', '{$_POST['Description']}')");
$sqlAddCategory->execute();

header('Location: index.php');