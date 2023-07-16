<?php

//Напишите функцию sum_intersect(array $arr1, array $arr2): int,
// которая найдет сумму пересекающихся значений в массиве.
// Например в массиве [2, 5, 7] и [1, 2, 5], пересекаются [2, 5] их сумма 7.

function sum_intersect(array $arr1, array $arr2): int
{
    return array_sum(array_intersect($arr1, $arr2));
}

assert(sum_intersect([1, 2, 5], [2, 5, 7]) == 7);



//Напишите функцию sum_n_elements(array $arr, int $n): int,
// которая считает сумму первых $n элементов массива.
// Например: Для массива [1, 2, 3, 4] при $n = 2 сумма первых элементов равна 3.

function sum_n_elements(array $arr, int $n): int
{
    $sum = 0;
    for ($i = 0; $i < $n; $i ++) {
        $sum += $arr[$i];
    }
    return $sum;
}

function sumNelements(array $arr, int $n): int
{
    if ($n > count($arr)) {
        throw new Exception("min cannot be more or equals than max");
    }

    return intval(array_sum(array_slice($arr, 0, $n)));
}

assert(sum_n_elements([1, 2, 5], 2) == 3);
assert(sumNelements([1, 2, 5],2) == 3);



//Напишите функцию sum_of_pairs(array $arr): array, которая считает суммы соседних чисел в массиве.
// Например: для массива [1, 2, 3, 4, 5, 6] результат будет [3, 7, 11]

function sum_of_pairs(array $arr): array
{
    return array_map('array_sum', array_chunk($arr, 2));
}

assert(sum_of_pairs([1, 2, 3, 4, 5, 6]) == [3, 7, 11]);