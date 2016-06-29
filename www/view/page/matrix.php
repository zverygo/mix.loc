<?php
$x = (int)($_GET['x']);
$n = (int)($_GET['n']);
echo 'Количество переменных = '.$x.'<br>';
echo 'Количество неравенств = '.$n.'<br>';
?>

<?php if (!isset($_GET['action'])) : ?>
<form method="post" action="index.php?x=<?=$x?>&n=<?=$n?>&action=can">
    <table>
        <?php
            for ($i =0; $i < $n; $i++){
                echo '<tr>';
                for ($j = 0; $j < $x; $j++){
                    echo '<td><input name="'.$i.'-'.$j.'"</td>';
                }
                echo '</tr>';
            }
        ?>
    </table>
    <input type="submit" value="apply" class="btn">
</form>

<?php endif ?>

<?php if (!empty($_GET['action'])) : ?>

    <form method="post" action="../../index.php?action=can">
        <?php
            echo '<table>';
                for ($i = 0; $i < $x; $i++ ){
                    echo '<tr>';
                    for ($j = 0; $j < $n; $j++){
                        
                        echo '<td>'.$_POST[$i.'-'.$j].'</td>';
                    }
                    echo '</tr>';
                }
            echo '</table>';
        ?>
        <input type="submit" value="Save" class="btn">
    </form>
    
<?php endif ?>

