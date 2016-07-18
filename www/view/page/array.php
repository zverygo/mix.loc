<?php
//--------------ВХОДНЫЕ ДАННЫЕ-----------

//кол-во переменных
$x = 2;
//кол-во неравинств
$n = 3;

//массив определяющий целевую функцию
$arr1 = array (5,10,0,0,0);
//переменная определяющая куда стремиться ЦФ, по умолчанию к max
$m = 'max';
//$m = 'min';

//массив определяющий векторы А (неравенства)
$arr2 = array (
                array (4,5,1),
                array (3,8,4),
                array (1,0,0),
                array (0,1,0),
                array (0,0,1)
              );
//масив определяющий опорное решение
$arr3 = array (96,144,48);

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

<?php
//----------ПОЕХАЛИ-------------
if (min($ai)<0){
    $min_ai = min($ai); //минимальная оценка
    $arr = array_keys($ai, min($ai)); //определяем индексы вхождения мин оценки
    $pp = $arr[0]; //номер вектора для вводы в базис
    $ab = ($arr2[$pp]); //вектор который надо ввести в базис
    
    if (max($arr2[$pp])>=0){
        while (min($ai)<0){
           for ($i=0;$i<$n;$i++){
                if ($arr2[$pp][$i] > 0){
                    $ar[$i] = $arr3[$i]/$arr2[$pp][$i];
                }
           }
            $min_ar = min($ar); //минимальное 
            $arr_i = array_keys($ar, $min_ar); 
            $pp_i = $arr_i[0]; 
            $Ai[$pp_i] = $pp; //вектор который надо вывести из базис
            for ($i=0;$i<$n;$i++) {
                $Cb[$i] = $arr1[$Ai[$i]];
            }
            $ved_el = $arr2[$pp][$pp_i]; //ведущий элемент
            for ($i=0;$i<$n;$i++) {
                if($i == $pp_i) {
                    $arr3i[$i] = $arr3[$i]/$ved_el;
                } else {
                   $arr3i[$i] = $arr3[$i] - ($arr2[$pp][$i]*$arr3[$pp_i])/$ved_el;
                }
            }
            $arr3=$arr3i;
            for ($i=0;$i<$n+$x;$i++) {
                for ($j=0;$j<$n;$j++) {
                    if($j == $pp_i) {
                        $arr2i[$i][$j] = $arr2[$i][$j]/$ved_el;
                    } else {
                        $arr2i[$i][$j] = $arr2[$i][$j] - $arr2[$pp][$j]*$arr2[$i][$pp_i]/$ved_el;
                    }
                }
            }
            $arr2=$arr2i;
            for ($i=0;$i<$x+$n;$i++){
                $ar = array_map(function ($el1, $el2) {
                    return $el1 * $el2;
                },
                $Cb, $arr2[$i]);
                $ai[$i] = array_sum($ar) - $arr1[$i];
            }
            $min_ai = min($ai); //минимальная оценка
            $arr = array_keys($ai, min($ai)); //определяем индексы вхождения мин оценки
            $pp = $arr[0]; //номер вектора для вводы в базис
            $ab = ($arr2[$pp]); //вектор который надо ввести в базис
        }
    } else {
        echo 'Целевая функция не ограничена';
    }
} else {
    echo 'Опорное решение оптимально <br>';
    echo '<pre>';
    print_r($ai);
    echo '</pre>';
}

echo 'Опорное решение оптимально <br>';

$arr_i = array();

for ($i=0;$i<$x;$i++) {
    $arr_i[] = array_keys($Ai,$i); //определяем индексы вхождения мин оценки
}
for ($i=0;$i<$x;$i++) {
    echo '<br>Первого рессурса необходимо '.$Cb[$arr_i[$i][0]]; //определяем индексы вхождения мин оценки
}


//считаем значение функции
for ($i=0;$i<$x;$i++){
    $ar = array_map(function ($el1, $el2) {
        return $el1 * $el2;
    },
    $Cb, $arr3);
    $f = array_sum($ar);
}

echo '<br>'.$f; 

?>