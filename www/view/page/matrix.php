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
            //целевая функция
            echo '<tr>';
            for ($r = 0; $r < $x; $r++){
                echo '<td><input name="'.'r'.$r.'"</td>';
            }        
            echo '<td>
                    <select name="mm">
                        <option value="max">max</option>
                        <option value="min">min</option>
                    </select>
                </td>';
            echo '</tr>';
            //ограничения
            for ($i =0; $i < $n; $i++){
                echo '<tr>';
                for ($j = 0; $j < $x; $j++){
                    echo '<td><input name="'.'a'.$i.'-'.$j.'"</td>';
                }
                //определяет знак ограничения
                echo '<td>
                        <select name="nn'.$i.'"> 
                            <option value="-1">≤</option>
                            <option value="0">=</option>
                            <option value="1">≥</option>
                        </select>
                      </td>';
                echo '<td><input name="'.'b'.$i.'"</td>';//опорное решение
                echo '</tr>';
            }
        ?>
    </table>
    <input type="submit" value="apply" class="btn">
</form>

<?php endif ?>

<?php if (!empty($_GET['action'])) : ?>

<?php
for($i=0;$i<$n;$i++){
    for($j=0;$j<$x;$j++){
        $arr2[$j][$i]=$_POST['a'.$i.'-'.$j];
    }
    $nn[$i]=$_POST['nn'.$i];
    $arr3[$i]=$_POST['b'.$i];
}
$m=$_POST['mm'];
for($i=0;$i<$x;$i++){
    $arr1[$i]=$_POST['r'.$i];
}
/*echo'<pre>';
print_r($arr1);
echo $m.'<br>';
print_r($arr2);
print_r($nn);
print_r($arr3);
echo'</pre>';*/

include 'in_data.php';
include 'view/page/simp.php';


?>


<?php endif ?>

