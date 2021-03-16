<h1 style="color: orange">Четвёртое задание</h1>

<?php

const COUNT = 1000;
const MIN_RAND = 1;
const MAX_RAND = 3000;


function _randArray($count = COUNT, $minRand = MIN_RAND, $maxRand = MAX_RAND)
{
    if ($count != COUNT && $count > $maxRand - $minRand) {
        $minRand = 1;
        $maxRand = $count * 3;
    }
    $myArray = [];
    for ($i = 0; $i < $count; $i++) {
        $num = mt_rand($minRand, $maxRand);
        $myArray[] = $num;
    }
    return $myArray;
}

function mergeSort(array $arr) {
    $count = count($arr);
    if ($count <= 1) {
        return $arr;
    }

    $left  = array_slice($arr, 0, (int)($count/2));
    $right = array_slice($arr, (int)($count/2));

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge(array $left, array $right) {
    $ret = array();
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] < $right[0]) {
            array_push($ret, array_shift($left));
        } else {
            array_push($ret, array_shift($right));
        }
    }

    array_splice($ret, count($ret), 0, $left);
    array_splice($ret, count($ret), 0, $right);

    return $ret;
}

echo '<pre>';
var_dump(mergeSort(_randArray($count = COUNT, $minRand = MIN_RAND, $maxRand = MAX_RAND)));
