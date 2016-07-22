<?


// -------НЕ ТРОГАТЬ!!!----------
/*$x = 4;

$n = 4;
//матрица записана по векторам
$arr2 = array (
                array (3,1,-2,1),
                array (2,-1,-2,5),
                array (1,4,-3,-1),
                array (1,-1,1,4)
              );
$arr3 = array (-2,-1,9,4);

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
echo '</pre>';*/
////////

$x = 4;

$n = 4;
//матрица записана по векторам
$arr2 = array (
                array (3,1,-2,1),
                array (2,-1,-2,5),
                array (1,4,-3,-1),
                array (1,-1,1,4)
              );
$arr3 = array (-2,-1,9,4);

for ($i=0;$i<$n-1;$i++) {
    for ($j=$i;$j<$n-1;$j++) {
        $a=$arr2[$i][$j+1]/$arr2[$i][$i];
        for($k=$i;$k<$n;$k++) {
            $arr2[$k][$j+1]-=$arr2[$k][$i]*$a;
        }
        $arr3[$j+1]-=$arr3[$i]*$a;
    }
}

for ($j=0;$j<$n;$j++) {
    $arr2i[$j][0]=$arr2[$j][0]/$arr2[0][0];
}
$arr3[0]/=$arr2[0][0];
for ($j=0;$j<$n;$j++) {
    $arr2[$j][0]=$arr2i[$j][0];
}


echo '<br>матрица записана по векторам';
echo '<pre>';
print_r($arr2);
print_r($arr3);
echo '</pre>';




?>
