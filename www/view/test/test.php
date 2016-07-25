<?php

$x = 3;

$n = 3;
//матрица записана по столбцам
$arr2 = array (
                array (2,3,3),
                array (-1,4,-2),
                array (-1,-2,4)
              );
$arr3 = array (4,11,11);






//прямой ход метода Гаусса
for ($i=0;$i<$n-1;$i++) {
    for ($j=$i;$j<$n-1;$j++) {
        //
        $a=$arr2[$i][$j+1]/$arr2[$i][$i];
        for($k=$i;$k<$n;$k++) {
            $arr2[$k][$j+1]-=$arr2[$k][$i]*$a;
        }
        $arr3[$j+1]-=$arr3[$i]*$a;
    }
}
//обратный ход
for ($i=$n-1;$i>=0;$i--) {
    for ($j=$i;$j>0;$j--) {
        //
        $a=$arr2[$i][$j-1]/$arr2[$i][$i];
        for($k=$i;$k>=0;$k--) {
            $arr2[$k][$j-1]-=$arr2[$k][$i]*$a;    
         }
        $arr3[$j-1]-=$arr3[$i]*$a;
    }
}
//находим иксы
for ($i=0;$i<$n;$i++) {
    $a=$arr2[$i][$i];
    for ($j=0;$j<$x;$j++) {
        $arr2[$j][$i]/=$a;
    }
    $arr3[$i]/=$a;
}
//выводим иксы
echo '<pre>';
print_r($arr3);
echo '</pre>';

?>
