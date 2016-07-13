<?php

$arr = array (
                array (1,2,3),
                array (4,0,6)

);

echo '<pre>';
print_r ($arr);
echo '</pre><br><br>';

echo $arr[1][1];
echo '<br><br>';


?>

<table>
    <?php
        for ($i = 0; $i < 3; $i++) {
            echo '<tr>';
            for ($j = 0; $j < 3; $j++){
                if (isset($arr[$i][$j])) {
                    $arr[$i][$j] = $arr[$i][$j] - $arr[$i][0]*$arr[$i][1]/$arr[1][0];
                    echo '<td>'.$arr[$i][$j].'</td>';
                }
                
            }
            echo '</tr>';
        }
        
    
    ?>
</table>

