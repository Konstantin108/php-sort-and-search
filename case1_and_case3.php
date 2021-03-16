<h1 style="color: red">Первое задание</h1>

<?php

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 22, 23, 24, 25, 26, 27, 28, 29, 30];

function display($data)
{
    echo 'Дан массив, в котором отсутсвует одно число: ';
    foreach ($data as $item) {
        echo $item . ' ';
    }
    echo '<br><br>';
}

display($arr);

function binarySearchPro($arr)
{
    $start = 0;
    $end = count($arr) - 1;
    $n = 0;

    while ($start <= $end) {
        $n++;
        $base = floor(($start + $end) / 2);
        if ($arr[$base] - 1 == $base) {
            $start = $base + 1;
        } else {
            $end = $base - 1;
        }
    }
    return [
        $n,
        $arr[$base] - 1
    ];
}

$res = binarySearchPro($arr);

function displayRes($res)
{
    for ($i = 0; $i < count($res); $i++) {
        $col = $res[0];
        $num = $res[1];
    }
    echo 'Отсутствующие число ' . $num . ' найдено за ' . $col . ' итераций';
}

displayRes($res);


?>

<h1 style="color: red">Третье задание</h1>

<?php

const COUNT = 100;
const MIN_RAND = 1;
const MAX_RAND = 200;


function _randArray($count = COUNT, $minRand = MIN_RAND, $maxRand = MAX_RAND)
{
    if ($count != COUNT && $count > $maxRand - $minRand) {
        $minRand = 1;
        $maxRand = $count * 10;
    }
    $myArray = [];
    for ($i = 0; $i < $count; $i++) {
        $num = mt_rand($minRand, $maxRand);
        $myArray[] = $num;
    }
    return $myArray;
}

function quickSortLesson(array $mas):array {

    $arrCount = count($mas);

    if($arrCount <= 1) {
        return $mas;
    }

    $base = $mas[0];
    $left = [];
    $right = [];

    for ($i = 1; $i < $arrCount; $i++) {

        if ($base >= $mas[$i]) {
            $left[] = $mas[$i];
        }

        else {
            $right[] = $mas[$i];
        }
    }

    $left = quickSortLesson($left);
    $right = quickSortLesson($right);

    return array_merge($left, [$base], $right);

}

function getSortRandArray($count = COUNT, $minRand = MIN_RAND, $maxRand = MAX_RAND){
    return quickSortLesson(_randArray($count, $minRand, $maxRand));
}

const NUM = 156;

$arr = getSortRandArray();

function binarySearch($myArray, $num)
{
    echo 'Бинарный поиск числа в диапозоне' . '<br><br>';
    $start = 0;
    $end = count($myArray) - 1;
    if(($myArray[$start] == $num) and ($myArray[$end] == $num)){
        echo "каждое число массива имеет значение $num";
    }else{
        while ($start <= $end) {

            $base = floor(($start + $end) / 2);

            if ($myArray[$base] == $num) {
                echo "Число $num найдено в диапозоне";
                for($i = $base; $i <= count($myArray); $i--){
                    if($myArray[$i] < $num){
                        echo " начиная с индекса " . ++$i;
                        break;
                    }
                }
                for($i = $base + 1; $i <= count($myArray); $i++){
                    if($myArray[$i] > $num){
                        echo " и заканчивая индексом " . --$i . '<br><br>';
                        break;
                    }
                }
                return $base;
            } elseif ($myArray[$base] < $num) {
                $start = $base + 1;
            } else {
                $end = $base - 1;
            }
        }
        echo "ЧИСЛО НЕ НАЙДЕНО!" . '<br>';
        return null;
    }
}

binarySearch($arr, NUM);

echo '<pre>';
print_r($arr);