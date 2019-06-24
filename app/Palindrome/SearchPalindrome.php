<?php


namespace App\Palindrome;

use App\Palindrome\PalindromeBuilder\CollectionPalindromeBuilder;
use App\Helpers\StringHelpers;

use Illuminate\Support\Collection;

class SearchPalindrome
{
    /**
     * @var CollectionPalindromeBuilder
     */
    protected $collectionPalindromeBuilder;


    /**
     * SearchPalindrome constructor.
     *
     * @param CollectionPalindromeBuilder $collectionPalindromeBuilder
     */
    public function __construct( CollectionPalindromeBuilder $collectionPalindromeBuilder )
    {
        $this->collectionPalindromeBuilder = $collectionPalindromeBuilder;
    }


    /**
     * Найти палиндромы
     *
     * @param $str
     *
     * @return Collection
     */
    public function searchPalindrome( $str )
    {
        $strCollection = StringHelpers::convertToCollectionForSearchPalindromes( $str );
        $this->collectionPalindromeBuilder->reset();

        for( $i = 0; $i < $strCollection->count(); $i++ ) {
            $take = $strCollection->count() - $i;

            for( $slice = 0; $slice < $i + 1; $slice++ ) {
                if( $take === 1 ) {
                    continue;
                }
                $this->comparisonStrings( $slice, $take, $strCollection );
            }
        }

        $result = $this->isPalindromeEmpty( $this->collectionPalindromeBuilder->getPalindrome() );

        return $result;

    }


    /**
     * Сравыниваем строки
     *
     *
     * @param            $slice
     * @param            $take
     * @param Collection $collection
     */
    public function comparisonStrings( $slice, $take, Collection $collection )
    {
        $searchPalindrome = $collection->slice( $slice )->take( $take );

        $searchPalindromeReverse = $searchPalindrome->reverse()->implode( '' );

        if( $searchPalindrome->implode( '' ) === $searchPalindromeReverse ) {
            $this->collectionPalindromeBuilder->pushPalindrome( $searchPalindromeReverse );
        }
    }


    /**
     *
     * Проверка на отсутствие палиндромов
     *
     * @param Collection $collection
     *
     * @return Collection
     */
    public function isPalindromeEmpty( Collection $collection )
    {
        if( $collection->isEmpty() ) {
            $collection->put( 'error', 'Палиндромы не найдены.' );
        }

        return $collection;
    }
}
