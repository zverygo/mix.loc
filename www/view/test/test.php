<?

$x = 3;

$n = 3;

$arr2 = array (
                array (1,2,4),
                array (-2,2,-1),
                array (1,-1,1)
              );


$arr3 = array (0,3,5);

/*echo '<pre>';
print_r($arr2);
//print_r($arr3);
echo '</pre>';*/

/*$a = $arr2[0][1]/$arr2[0][0];

$arr2[0][1] = $arr2[0][1]-$arr2[0][0]*$a;
$arr2[1][1] = $arr2[1][1]-$arr2[1][0]*$a;
$arr2[2][1] = $arr2[2][1]-$arr2[2][0]*$a;

$a = $arr2[0][2]/$arr2[0][0];

$arr2[0][2] = $arr2[0][2]-$arr2[0][0]*$a;
$arr2[1][2] = $arr2[1][2]-$arr2[1][0]*$a;
$arr2[2][2] = $arr2[2][2]-$arr2[2][0]*$a;

$a = $arr2[1][2]/$arr2[1][1];

$arr2[1][2] = $arr2[1][2]-$arr2[1][1]*$a;
$arr2[2][2] = $arr2[2][2]-$arr2[2][1]*$a;

echo '<pre>';
print_r($arr2);
echo '</pre>';*/

$arr2_2 = array (
                array (1,-2,1),
                array (2,2,-1),
                array (4,-1,1)
              );


    
for ($i=0;$i<$n-1;$i++) {
    //echo '<br>__'.$arr2_2[$j+1][$i];
    //echo '<br>__'.$arr2_2[$j][$i];
    //echo '<br>'.$a=$arr2_2[$j+1][$i]/$arr2_2[$j][$i];
    for ($j=$i;$j<$n-1;$j++) {
        echo '<br>__'.$b=$arr2_2[$j+1][$i];
        echo '<br>__'.$c=$arr2_2[$i][$i];
        echo '<br>'.$a=$b/$c;
        for($k=$i;$k<$n;$k++) {
            $arr2_2[$j+1][$k]=$arr2_2[$j+1][$k]-$arr2_2[$i][$k]*$a;
        }
        echo '<pre>';
        print_r($arr2_2);
        echo '</pre>';
    }
    /*echo '<pre>';
    print_r($arr2_2);
    echo '</pre>';*/
}
/*echo '<pre>';
print_r($arr2_2);
echo '</pre>';*/


?>
