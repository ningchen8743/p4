<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bunny;

class SearchController extends Controller
{
    public function searchBunny()
    {
        $bunny = new Bunny();
        $bunnies = $bunny->where('breed', '=', '')->get();
    }
}
