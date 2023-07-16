<?php

//Создать функцию even_to_zero(int $number) Которая цифры на четных ПОЗИЦИЯХ занулит.
// Например, из 12345 получается число 10305. Внимание! Важна позиция цифры, а не значение.

function even_to_zero(int $number): int
{
    $split = str_split($number);
    $size = count($split);

    for ($i = 1; $i < $size; $i += 2) {
        $split[$i] = 0;
    }

    return implode($split);
}

function evenToZero(int $num): int
{
    return intval(
        join(
            array_map(
                function ($el, $ind) {
                    return ($ind % 2) ? $el : 0;
                },
                str_split(strval($num)),
                range(1, strlen(strval($num)))
            )
        )
    );
}

assert(even_to_zero(1234567)==1030507);
assert(evenToZero(1234567)==1030507);



// Создать функцию is_palindrome(string $word) которая выведет true если строка является палиндромом(читается одинаково в зад и вперед, например: шалаш) и иначе false.
// Внимание! Обязательно включите в проверки русские слова "шалаш" и "такси".

function is_palindrome(string $word): bool
{
    $word = mb_strtolower($word);
    $reverse = "";
    $count = mb_strlen($word, 'utf-8');
    for ($i = 1; $i <= $count; $i++) {
        $reverse .= mb_substr($word, -$i, 1, 'utf-8');
    }
    if ($word == $reverse) {
        return true;
    } else {
        return false;
    }
}

function isPalindrom(string $word): bool
{
    return !strcmp(
        mb_strtolower($word),
        join(
            array_reverse(
                mb_str_split(mb_strtolower($word))
            )
        )
    );
}

assert(is_palindrome('Шалаш')==true);
assert(is_palindrome('Такси')==true);
assert(isPalindrom('Шалаш')==true);
assert(isPalindrom('Такси')==true);



//Написать функцию array_double, которая принимает на вход массив чисел, например [1,2,3]
// и возвращает массив, в котором все числа умножены на 2, например [2, 4, 6]

function array_double($array): array
{
    foreach ($array as &$value) {
        $value = $value * 2;
    }
    return $array;
}

function arrayDouble(array $arr): array
{
    return array_map(
        function ($el) {
            return $el * 2;
        },
        $arr
    );
}

assert(array_double([3,5,7])==[6,10,14]);
assert(arrayDouble([3,5,7])==[6,10,14]);



//Написать функцию only_odd, которая принимает массив [1, 2, 3]
// и возвращает массив только нечетных [1, 3]

function only_odd($arr): array
{
    $odd = [];
    foreach ($arr as $val) {
        if ($val % 2 != 0) {
            array_push($odd, $val);
        }
    }
    return $odd;
}

function onlyOdd($arr): array
{
    return array_values(
        array_filter(
            $arr,
            function ($el) {
                return $el & 1;
            }
        )
    );
}

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

assert(only_odd($arr) == [1, 3, 5, 7, 9]);
assert(onlyOdd($arr) == [1, 3, 5, 7, 9]);
