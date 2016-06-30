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
            echo '<tr>';
            for ($r = 0; $r < $x; $r++){
                echo '<td><input name="'.'r'.$r.'"</td>';
            }        
            echo '<td>
                    <select name="m-m">
                        <option value="max">max</option>
                        <option value="min">min</option>
                    </select>
                </td>';
            echo '</tr>';
            for ($i =0; $i < $n; $i++){
                echo '<tr>';
                for ($j = 0; $j < $x; $j++){
                    echo '<td><input name="'.'a'.$i.'-'.$j.'"</td>';
                }
                echo '<td>
                        <select name="'.$i.'ner">
                            <option value="m">m</option>
                            <option value="m-r">m-r</option>
                            <option value="r">r</option>
                            <option value="b-r">b-r</option>
                            <option value="b">b</option>
                        </select>
                      </td>';
                echo '<td><input name="'.'b'.$i.'"</td>';
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
                echo '<tr>';
                    for ($r = 0; $r < $x; $r++){
                        echo '<td>'.$_POST['r'.$r].'</td>';
                    }        
                echo '<td>'.$_POST['m-m'].'</td>';
                echo '</tr>';
                for ($i = 0; $i < $n; $i++ ){
                    echo '<tr>';
                    for ($j = 0; $j < $x; $j++){
                        
                        echo '<td>'.$_POST['a'.$i.'-'.$j].'</td>';
                    }
                    echo '<td>'.$_POST[$i.'ner'].'</td>';
                    echo '<td>'.$_POST['b'.$i].'</td>';
                    echo '</tr>';
                }
            echo '</table>';
        ?>
        <input type="submit" value="Save" class="btn">
    </form>
    
<?php endif ?>

