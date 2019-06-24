<?php


namespace App\Helpers;


class StringHelpers
{
    /**
     * Конвртируем строку в коллекцию для поиска палиндромов
     *
     * @param $str
     *
     * @return \Illuminate\Support\Collection
     */
    static public function convertToCollectionForSearchPalindromes($str){
        // Убрираем ненужные символы
        $str = str_replace( [',','.',' ','?','!'], '', $str );

        // Конвертируем в нижний регистр
        $str = mb_convert_case( $str, MB_CASE_LOWER, "UTF-8" );

        // Конвертируем в массив затем в коллекцию
        $strCollection = collect( preg_split( '//u', $str, NULL, PREG_SPLIT_NO_EMPTY ) );

        return $strCollection;
    }
}
