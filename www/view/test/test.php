<?php

$x = 3;//можно считать как коллво элементов в массиве опред коэфф цел функции

$n = 3;
//матрица записана по столбцам
$arr2 = array (
                array (0,2,1),
                array (2,1,0),
                array (2,0,1)
                   
              );
$arr3 = array (2,1,9);

//прямой ход метода Гаусса
for ($i=0;$i<$n-1;$i++) {
    for ($j=$i;$j<$n-1;$j++) {
        //
        //for ($t=0;$t<$n;$t++){
            if($arr2[$i][$i] == 0) {
                echo '<br>меняем местами строки';
                for ($q=0;$q<$n;$q++){
                    $aa=$arr2[$q][$i];
                    $arr2[$q][$i]=$arr2[$q][$i+1];
                    $arr2[$q][$i+1]=$aa;
/*
                    $bb=$arr3[$i];
                    $arr3[$i]=$arr3[$i+1];
                    $arr3[$i+1]=$bb;*/

                }
                $bb=$arr3[$i];
                    $arr3[$i]=$arr3[$i+1];
                    $arr3[$i+1]=$bb;
            }
       //}
        print_r($arr3);
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
       /* if($arr2[$i][$i] == 0) {
            echo 'меняем местами строки';
            for ($q=0;$q<$n;$q++){
                $aa=$arr2[$q][$i];
                $arr2[$q][$i]=$arr2[$q][$i+1];
                $arr2[$q][$i+1]=$aa;
                
                $bb=$arr3[$i];
                $arr3[$i]=$arr3[$i+1];
                $arr3[$i+1]=$bb;
            }
        }     */   
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
print_r($arr2);
print_r($arr3);
echo '</pre>';

?>