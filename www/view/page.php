<?php
    include 'page/header.php';
    $row = new Post (HOST, USER, PASS, DB);
?>

<div class="container">
    <?php
        if (empty($_GET['action'])) {
            if (empty($_GET['x']) && empty($_GET['n'])) {
                include 'page/start.php';
            }
            else if (!empty($_GET['x']) && !empty($_GET['n'])) {
                include 'page/matrix.php';
            }
        }
        else if ($_GET['action'] == 'can') {
            include 'page/matrix.php';
        }
    ?>
</div>

<?php include 'page/footer.php' ;?>
        
