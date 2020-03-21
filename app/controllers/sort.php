<?php


namespace App\Controllers;

use App\Utility;

class Sort
{
    function index(){
        Utility\Sort::setSortParams(Utility\Sort::getSortParams()[0], Utility\Sort::getSortParams()[1]);
    }
}