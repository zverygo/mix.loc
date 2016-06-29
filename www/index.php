<?php

include 'config.php';
include 'class/Page.php';
include 'class/Post.php';

$page = new Page ();

if (empty($_POST['x']) && empty($_POST['n'])) {
    echo $page -> get_body($text, 'view/page');
}
else if (!empty($_POST['x']) && !empty($_POST['n'])) {
    echo $page -> get_body($text, 'view/page');
}
?>
