<?php
require_once __DIR__.'/boot.php';

$sqlTree = pdo()->prepare("SELECT * FROM `categories`");
$sqlTree->execute();

if ($sqlTree->rowCount() > 0) {
    $categories = array();

    while($category =  $sqlTree->fetch()) {
        $categories[$category['parent_id']][$category['id']] =  $category;
    }
}

function build_tree($categories, $parent_id)
{
    if(is_array($categories) and isset($categories[$parent_id])) {
        $tree = '<ul>';
            foreach($categories[$parent_id] as $category) {
                $tree .= '<li><a href="' . $category['id'] . '">' . $category['name'] . '</a> -- ' . '<nobr title="ID = ' . $category['id']. '"> (' . $category['description'] . ') </nobr>' .  '<a  title="Edit" href="?edit=' . $category['id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg></a><a  title="Delete" href="?del=' . $category['id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></a>';
                $tree .=  build_tree($categories, $category['id']);
                $tree .= '</li>';
            }
        $tree .= '</ul>';
    }
    else return null;
    return $tree;
}

// Delete category
if (isset($_GET['del'])) {
$sqlDeleteCategory = pdo()->query("DELETE FROM `categories` WHERE `id` = {$_GET['del']}");
$sqlDeleteCategory->execute();

header('Location: index.php');
}