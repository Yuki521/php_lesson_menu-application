<?php

namespace Yuki\lesson1;

class ArrayUtil
{
    /**
     * @param array $intList
     * @return array
     */
    public static function evensOf(array $intList): array
    {
        return array_values(array_filter($intList, fn($int) => $int % 2 === 0));
    }

    /**
     * @param int $int
     * @param string $string
     * @return array
     */
    public static function replicate(int $int, string $string)
    {
        return array_fill(0, $int, $string);
    }

    /**
     * @param array $array1
     * @param array $array2
     * @return array
     */
    public static function zip(array $array1, array $array2): array
    {
        $num = min(count($array1), count($array2));
        $array = [];
        for ($i = 0; $i < $num; $i++) {
            $array[] = new Pair($array1[$i], $array2[$i]);
        }
        return $array;
    }

    /**
     * @param int $arg
     * @return array
     */
    public static function factors(int $arg): array
    {
        if ($arg === 0) {
            return [];
        }
        return array_filter(range(1, $arg), fn($int) => $arg % $int === 0);
    }

    /**
     * @param int $arg
     * @return array
     */
    public static function perfects(int $arg): array
    {
        //1.約数の和を求める
        //2.約数の和から自分自身の数を引く
        //3.その数が等しければその数を返す
        if ($arg === 0) {
            return [];
        }
        return array_filter(range(1, $arg), fn($int) => array_sum(self::factors($int)) - $int === $int);
    }

    /**
     * @param array $arg
     * @return array
     */
    public static function pairs(array $arg): array
    {
        $intArray = [];
        for ($i = 0; $i < count($arg); $i++) {
            if ($i + 1 < count($arg)) {
                $intArray[] = new Pair($arg[$i], $arg[$i + 1]);
            }
        }
        return $intArray;
    }

    /**
     * @param array $arg
     * @return bool
     */
    public static function sorted(array $arg): bool
    {
        return empty(array_filter(self::pairs($arg), fn($pair) => $pair->first > $pair->second));
    }

    /**
     * @param int $int
     * @param array $intArray
     * @return array
     */
    public static function positions(int $int, array $intArray): array
    {
        $replicate = self::replicate(count($intArray), $int);
        $zip = self::zip($intArray, $replicate);
        $positions = array_filter($zip, fn($zip) => $zip->first === $zip->second);
        return array_keys($positions);
    }
}