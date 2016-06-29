<?php
$x = (int)($_POST['x']);
$n = (int)($_POST['n']);
echo 'Количество переменных = '.$x.'<br>';
echo 'Количество неравенств = '.$n.'<br>';
?>


<?php ?>

    <form method="post" action="../../index.php?action=matrix">
        <?php
            echo '<table>';
                for ($i = 0; $i < $x; $i++ ){
                    echo '<tr>';
                    for ($j = 0; $j < $n; $j++){
                        echo '<td>'.'<input name='."$i.$j".' autofocus required>'.'</td>';
                    }
                    echo '</tr>';
                }
            echo '</table>';
        ?>
        <input type="submit" value="Save" class="btn">
    </form>

<?php ?>



