<?php

namespace App\Http\Controllers\Palindrome;

use App\Http\Controllers\Controller;
use App\Palindrome\SearchPalindrome;
use Illuminate\Http\Request;

class PalindromeController extends Controller
{
    /**
     * Поиск палиндромов
     *
     * @param Request          $request
     * @param SearchPalindrome $searchPalindrome
     *
     * @return \Illuminate\Support\Collection
     */
    public function search(Request $request,SearchPalindrome $searchPalindrome){
        $str = $request->get('palindrome');

        return $searchPalindrome->searchPalindrome($str);
    }

}
