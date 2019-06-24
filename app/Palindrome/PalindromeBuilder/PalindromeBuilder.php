<?php


namespace App\Palindrome\PalindromeBuilder;


use Illuminate\Support\Collection;

interface PalindromeBuilder
{
    /**
     * Добавить палиндром
     *
     * @param $palindrome
     *
     * @return PalindromeBuilder
     */
    public function pushPalindrome( $palindrome );


    /**
     * Вернуть палиндромы
     *
     * @return mixed
     */
    public function getPalindrome();
}
