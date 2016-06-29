<?php
$x = (int)($_POST['x']);
$n = (int)($_POST['n']);
echo 'Количество переменных = '.$x.'<br>';
echo 'Количество неравенств = '.$n.'<br>';
?>


    <form method="post" action="view/page/can.php">
        <?php
            echo '<table>';
                for ($i = 0; $i < $n; $i++ ){
                    echo '<tr>';
                    for ($j = 0; $j < $x; $j++){
                        echo '<td>'.'<input name="'.$i.'.'.$j.'" placeholder="'.$i.'-'.$j.'" autofocus required>'.'</td>';
                    }
                    echo '</tr>';
                }
            echo '</table>';
        ?>
        <div class="form-group">
        <label>test</label>
        <br>
        <input name="test" required>
        </div>
        <input type="submit" value="Save" class="btn">
    </form>


