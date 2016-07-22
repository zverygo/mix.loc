<?

$x = 3;

$n = 3;
//матрица записана по векторам
$arr2 = array (
                array (1,2,4),
                array (-2,2,-1),
                array (1,-1,1)
              );
$arr3 = array (0,3,5);

for ($i=0;$i<$n-1;$i++) {
    for ($j=$i;$j<$n-1;$j++) {
        $a=$arr2[$i][$j+1]/$arr2[$i][$i];
        for($k=$i;$k<$n;$k++) {
            $arr2[$k][$j+1]-=$arr2[$k][$i]*$a;
        }
        $arr3[$j+1]-=$arr3[$i]*$a;
    }
}
echo '<br>матрица записана по векторам';
echo '<pre>';
print_r($arr2);
print_r($arr3);
echo '</pre>';


// матрица записанна по неравенствам
/*$arr2_2 = array (
                array (1,-2,1),
                array (2,2,-1),
                array (4,-1,1)
              );


    
for ($i=0;$i<$n-1;$i++) {
    for ($j=$i;$j<$n-1;$j++) {
        echo '<br>__'.$b=$arr2_2[$j+1][$i];
        echo '<br>__'.$c=$arr2_2[$i][$i];
        echo '<br>'.$a=$b/$c;
        for($k=$i;$k<$n;$k++) {
            $arr2_2[$j+1][$k]=$arr2_2[$j+1][$k]-$arr2_2[$i][$k]*$a;
        }
    }
}
echo '<br>матрица записанна по неравенствам';
echo '<pre>';
print_r($arr2_2);
echo '</pre>';*/


?>
