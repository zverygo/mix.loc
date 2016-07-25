<?php

$x = 4;

$n = 4;
//матрица записана по неравенствам
$arr2 = array (
                array (3,2,1,1),
                array (2,-1,4,-1),
                array (-2,-2,-3,1),
                array (1,5,-1,4)
              );
$arr3 = array (-2,-1,9,4);

/*echo '<pre>';
print_r($arr2);
//print_r($arr3);
echo '</pre>';*/

//прямой ход метода Гаусса
for ($i=0;$i<$n-1;$i++) {
    for ($j=$i;$j<$n-1;$j++) {
        $a=$arr2[$i][$j+1]/$arr2[$i][$i];
        for($k=$i;$k<$n;$k++) {
            $arr2[$k][$j+1]-=$arr2[$k][$i]*$a;
        }
        $arr3[$j+1]-=$arr3[$i]*$a;
    }
}
/*echo '<br> прямой ход';
echo '<pre>';
print_r($arr2);
//print_r($arr3);
echo '</pre>';*/

//обратный ход
for ($i=$n-1;$i>=0;$i--) {
    for ($j=$i;$j>0;$j--) {
        //echo '<br>__'.$arr2[$j-1][$i];
        //echo '<br>__'.$arr2[$i][$i];
        //echo '<br>'.$a=$arr2[$j-1][$i]/$arr2[$i][$i];
        $a=$arr2[$i][$j-1]/$arr2[$i][$i];
        for($k=$i;$k>=0;$k--) {
            //echo '<br>    '.$arr2[$j-1][$k];
            $arr2[$k][$j-1]-=$arr2[$k][$i]*$a;    
            //$arr2[$k][$j-1]-=$arr2[$k][$i]*$a;
            
        }
        //echo '<pre>';
        //print_r($arr2);
        //echo '</pre>';
        //$arr3[$j-1]-=$arr3[$i]*$a;
    }
}

echo '<br> обратный ход';
echo '<pre>';
print_r($arr2);
//print_r($arr3);
echo '</pre>';


/*for ($j=0;$j<$n;$j++) {
    $arr2i[$j][0]=$arr2[$j][0]/$arr2[0][0];
}
$arr3[0]/=$arr2[0][0];
for ($j=0;$j<$n;$j++) {
    $arr2[$j][0]=$arr2i[$j][0];
}*/

?>
