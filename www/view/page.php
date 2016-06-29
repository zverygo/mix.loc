<?php
    include 'page/header.php';
    $row = new Post (HOST, USER, PASS, DB);
?>

<div class="container">
    <?php
        if (empty($_POST['x']) && empty($_POST['n'])) {
            include 'page/start.php';
        }
        else if (!empty($_POST['x']) && !empty($_POST['n'])) {
            include 'page/matrix.php';
        }
    ?>
</div>

<?php include 'page/footer.php' ;?>
        
