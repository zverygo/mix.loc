<?

//----------------ВХОДНЫЕ ДАННЫЕ---------------

//кол-во переменных
$x = 4;
//кол-во неравинств
$n = 7;

//массив определяющий целевую функцию
$arr1 = array (315,278,573,370);
//переменная определяющая куда стремиться ЦФ, по умолчанию к max
$m = 'max';
//$m = 'min';

//массив определяющий векторы А (неравенства)
$arr2 = array (
                array (550,40,86,160,0,3,4.5),
                array (620,30,110,92,158,4,4.5),
                array (0,20,150,158,30,3,4.5),
                array (0,20,52,128,50,4,4.5)
              );

//массив с типами неравенств -1 меньше_равно, 0 равно, 1 больше_равно
$nn = array (-1,-1,-1,-1,-1,-1,-1);

//масив определяющий опорное решение
$arr3 = array (64270,4800,22360,26240,7900,520,720);

//УБРАТЬ ВНИЗ, Т К ЭТО ОПРЕДЕЛЯЕТСЯ ПОСЛЕ ВСЕГО
/*
//массив с номерами векторов образующих базис
for ($i=0;$i<$n;$i++) {
    $Ai[$i] = $x+$i;
}

//массив Cb
for ($i=0;$i<$n;$i++) {
    //$q = $Ai[$i];
    $Cb[$i] = $arr1[$Ai[$i]];
}

//массив оценок
for ($i=0;$i<$x;$i++){
    $ar = array_map(function ($el1, $el2) {
        return $el1 * $el2;
    },
    $Cb, $arr2[$i]);
    $ai[$i] = array_sum($ar) - $arr1[$i];
}
*/
//----------------------------------------------Ц

//---------------ПРИВОДИМ ДАННЫХ--------------


//меняем знак целевой функциие если задача на минимум
if($m == 'min'){
    for ($i=0;$i<$x;$i++){
        $arr1_i[$i] = $arr1[$i]*(-1);
    }
    $arr1 = $arr1_i;
}

//неравенства со знаком больше_равно
$nn_b = array_keys($nn, 1);

//меняем знак неравенств больше_равно
if (count($nn_b)>0){
    for($i=0;$i<count($nn_b);$i++) {
        for($j=0;$j<$x;$j++) {
            $arr2[$j][$nn_b[$i]]*=(-1);
        }
        $arr3[$nn_b[$i]]*=(-1);
}
/*echo '<pre>';
print_r ($arr2);
echo '</pre>';

echo '<pre>';
print_r ($arr3);
echo '</pre>';
*/
}

//равенства
$nn_r = array_keys($nn, 0);

//вводим искуственый базис 
for ($i=0;$i<$n+$x;$i++){
    for ($j=0;$j<$n;$j++){
        if(empty($arr2[$i][$j])){
            if (($j+$x) == $i) {
                $arr2[$i][$j] = 1;
            } else {
                $arr2[$i][$j] = 0;
            }
        }
    }
    if(empty($arr1[$i])){
        $arr1[$i] = 0;
    }
}
/*echo '<pre>';
print_r($arr2);
echo '</pre>';

echo '<pre>';
print_r($arr1);
echo '</pre>';*/

//массив с номерами векторов образующих базис
for ($i=0;$i<$n;$i++) {
    $Ai[$i] = $x+$i;
}

//массив Cb
for ($i=0;$i<$n;$i++) {
    //$q = $Ai[$i];
    $Cb[$i] = $arr1[$Ai[$i]];
}

//массив оценок
for ($i=0;$i<$x;$i++){
    $ar = array_map(function ($el1, $el2) {
        return $el1 * $el2;
    },
    $Cb, $arr2[$i]);
    $ai[$i] = array_sum($ar) - $arr1[$i];
}
?>