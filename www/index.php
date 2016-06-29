<?php

include 'config.php';
include 'class/Page.php';
include 'class/Post.php';

$page = new Page ();

if (!isset($_GET['action'])) {
    if (empty($_GET['x']) && empty($_GET['n'])) {
        echo $page -> get_body($text, 'view/page');
    }
    else if (!empty($_GET['x']) && !empty($_GET['n'])) {
        echo $page -> get_body($text, 'view/page');
    }
}
else if ($_GET['action'] == 'can') {
    //echo $_POST['0-0'];
    //echo '111';
    echo $page -> get_body($text, 'view/page');
}
?>
