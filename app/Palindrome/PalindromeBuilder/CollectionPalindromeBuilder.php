<?php


namespace App\Palindrome\PalindromeBuilder;


use Illuminate\Support\Collection;

class CollectionPalindromeBuilder implements PalindromeBuilder
{
    /**
     * @var
     */
    public $palindromeCollection;


    /**
     * Reset
     */
    public function reset(): void
    {
        $this->palindromeCollection = new Collection();
    }


    /**
     * Добавить палиндром в коллекцию
     *
     * @param $palindrome
     *
     * @return PalindromeBuilder|void
     */
    public function pushPalindrome( $palindrome )
    {
        $this->palindromeCollection->push( $palindrome );
    }


    /**
     * Вернуть коллекцию со всеми палиндромами
     *
     * @return Collection
     */
    public function getPalindrome()
    {
        return $this->palindromeCollection;
    }
}
