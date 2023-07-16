<?php

//Напишите функцию divisible_by_three(int $max, int $min): array,
// которая формирует убывающий массив от $max и до $min из чисел, которые делятся на 3 без отстатка.
// В тестах проверьте что первый, последний и любой некрайний элемент списка действительно делятся на 3.
// Например для three_devided_range(1002, 0) вернет массив [1002, 999, ... 0]

function divisible_by_three(int $max, int $min): array
{
    $arr = [];
    for ($i = $min; $i <= $max; $i++) {
        if ($i % 3 == 0) {
            array_push($arr, $i);
        }
    }
    return $arr;
}

function divisibleByThree(int $max, int $min): array
{
    return array_values(
        array_filter(
            range($min, $max),
            function ($el) {
                return $el % 3 == 0;
            }
        )
    );
}

assert(divisible_by_three(999, 1) == [1002, 999, ... 0]);
assert(divisibleByThree(999, 1) == [1002, 999, ... 0]);



//Напишите функцию count_even(array $arr): int, которая считает количество четных чисел в массиве.
// В массиве [1, 2, 3] - только 1 четный элемент.

function count_even(array $arr): int
{
    $evenArr = [];
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] % 2 == 0) {
            array_push($evenArr, $arr[$i]);
        }
    }
    return count($evenArr);
}

function countEven(array $arr): int
{
    return count(
        array_filter(
            $arr,
            function ($el) {
                return $el % 2 == 0;
            }
        )
    );
}

assert(count_even([1, 2, 3, 4, 5]) == 2);
assert(countEven([1, 2, 3, 4, 5]) == 2);



//Напишите функцию min_even(array $arr): int, Найдите наименьший четный(по значению) элемент массива.
// В массиве [1, 2, 3, 4] - 2 наименьший четный элемент.

function min_even(array $arr): int
{
    $evenArr = [];
    for ($i = 0; $i < count($arr); $i ++) {
        if ($arr[$i] % 2 == 0) {
            array_push($evenArr, $arr[$i]);
        }
    }

    return min($evenArr);
}

function minEven(array $arr): int
{
    return min(
        array_filter(
            $arr,
            function ($el) {
                return $el % 2 == 0;
            }
        )
    );
}

assert(min_even([1, 2, 3, 4, 5]) == 2);
assert(minEven([1, 2, 3, 4, 5]) == 2);



//Напишите функцию min_sum_elements(array $arr): array, которая возвращает два соседних элемента, сумма которых минимальна.
// В массиве [1, 2, 3, 4] это элементы [1, 2].

function min_sum_elements(array $arr): array
{
    $sum = [];

    for ($i = 0; $i < count($arr) - 1; $i++) {
        $sum[$i] = $arr[$i] + $arr[$i + 1];
    }

    $minPos = array_search(min($sum), $sum);

    return [$arr[$minPos], $arr[$minPos + 1]];
}

function min_sum_elements2(array $arr): array
{
    $min = 0;
    $result = [];

    for ($i = 0; $i < count($arr) - 1; $i++) {
        $first = $arr[$i];
        $second = $arr[$i + 1];
        $sum = $first + $second;

        if ($min == 0) {
            $min = $sum;
            $result[0] = $first;
            $result[1] = $second;
        } else {
            if ($sum < $min) {
                $result[0] = $first;
                $result[1] = $second;
            }
        }
    }
    return $result;
}

assert(min_sum_elements([1, 2, 3, 4, 5]) == [1, 2]);
assert(min_sum_elements2([1, 2, 3, 4, 5]) == [1, 2]);
