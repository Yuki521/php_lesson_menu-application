<?php

namespace Yuki;

class ArrayUtil
{
    /**
     * @param array $intList
     * @return array
     */
    public static function evensOf(array $intList): array
    {
        return array_filter($intList, fn($int) => $int % 2 === 0);
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
     * @param int $int
     * @return array
     */
    public static function factors(int $int): array
    {
        $intArray = [];
        for ($i = 1; $i < $int + 1; $i++) {
            if ($int % $i === 0) {
                $intArray[] = $i;
            }
        }
        return $intArray;
    }

    /**
     * @param int $int
     * @return array
     */
    public static function perfects(int $int): array
    {
        //1.約数の和を求める
        //2.約数の和から自分自身の数を引く
        //3.その数が等しければその数を返す
        $intArray = [];
        for ($i = 1; $i < $int + 1; $i++) {
            if(array_sum(self::factors($i)) - $i === $i){
                $intArray[] = $i;
            }
        }
        return $intArray;
    }
}