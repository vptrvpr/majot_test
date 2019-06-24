<?php

namespace App\Console\Commands;

use App\Palindrome\PalindromeBuilder\CollectionPalindromeBuilder;
use Illuminate\Console\Command;
use App\Palindrome\SearchPalindrome;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    protected $searchPalindrome;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SearchPalindrome $searchPalindrome)
    {
        $this->searchPalindrome = $searchPalindrome;

        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $str = 'Довод казак';

        dd($this->searchPalindrome->searchPalindrome($str));
    }
}
