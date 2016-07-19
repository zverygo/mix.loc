<?php include '../../in_data.php';?>

<?php
//----------ПОЕХАЛИ-------------
if (min($ai)<0){
    $min_ai = min($ai); //минимальная оценка
    $arr = array_keys($ai, min($ai)); //определяем индексы вхождения мин оценки
    $pp = $arr[0]; //номер вектора для вводы в базис
    $ab = ($arr2[$pp]); //вектор который надо ввести в базис
    if($m == 'min'){
        for ($i=0;$i<$x;$i++){
            $arr1[$i] = $arr1[$i]*(-1);
        }
    }
    if (max($arr2[$pp])>=0){
        while (min($ai)<0){
            for ($i=0;$i<$n;$i++){
                if ($arr2[$pp][$i] > 0){
                    $ar[$i] = $arr3[$i]/$arr2[$pp][$i];
                }
            }
            //обработка возвращающая минимальный положительный отличный от нуля элемент массива ar[]
            $output = array_filter($ar, function($elem) {
                return $elem > 0;
            });
            $min_ar = min($output);
            
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
    $arr_i[] = array_keys($Ai,$i);
}
for ($i=0;$i<$x;$i++) {
    echo '<br>'.($i+1).' рессурса необходимо '.$arr3[$arr_i[$i][0]]; 
}


//считаем значение функции
for ($i=0;$i<$x;$i++){
    $ar = array_map(function ($el1, $el2) {
        return $el1 * $el2;
    },
    $Cb, $arr3);
    $f = array_sum($ar);
}

echo '<br> F(x) = '.$f; 

?>