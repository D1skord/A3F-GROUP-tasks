<?php

/**
 * Меняет местами первый и выбранный элемент в массиве
 *
 * @param $arr array
 * @param $num integer
 */
function array_swap(&$arr, $num) {
    if (!empty($arr[$num]) && $num != 0) {
        $tmp = $arr[0];
        $arr[0] = $arr[$num];
        $arr[$num] = $tmp;
    }
}

$array = [4, 5, 8, 9, 1, 7, 2];

$lastIndex = count($array) - 1;
$index = $lastIndex;

while ($index > 0) {
    $currentLessFirst = $array[$index] < $array[0];
    $currentLessPrev = $array[$index]  < $array[$index - 1];

    if ($currentLessFirst || $currentLessPrev) {
        if($currentLessFirst){
            array_swap($array, $index);
        } else {
            array_swap($array, $index - 1);
        }
        $index = $lastIndex;
    } else {
        $index--;
    }
}

print_r($array);