<?php

//массив определяющий целевую функцию
$arr1 = array (5,10);
//переменная определяющая куда стремиться ЦФ, по умолчанию к max
$m = 'max';
//$m = 'min';

//массив определяющий векторы А  (неравенства)
$arr2 = array (
                array (4,5,1),
                array (3,8,4)
              );
//масив определяющий опорное решение
$arr3 = array (96,144,48);

echo $ii=count($arr1).'<br>';
echo $nn=count($arr2).'<br>';
echo $jj=count($arr2[0]).'<br>';

//массив с номерами векторов образующих базис
echo 'массив с номерами векторов образующих базис';
for ($i=0;$i<$;$i++){
    $ar = array_map(function ($el1, $el2) {
        return $el1 * $el2;
    },
    $arr4, $arr2[$i]);
    $ai[$i] = array_sum($ar) - $arr1[$i];

//массив 
$arr4 = array (0,0,0);

//массив оценок
echo 'массив оценок';
for ($i=0;$i<$ii;$i++){
    $ar = array_map(function ($el1, $el2) {
        return $el1 * $el2;
    },
    $arr4, $arr2[$i]);
    $ai[$i] = array_sum($ar) - $arr1[$i];
}
echo '<pre>';
print_r ($ai);
echo '</pre><br><br>';





?>

