<?php

namespace App\Http\Controllers;

use App\Utilities\Practice;
use Illuminate\Http\Request;
use App\Bunny;

class SearchController extends Controller
{
    public function searchBunny()
    {
        $bunny = new Bunny();
        $bunnies = $bunny->where('breed', '=', 'Lionhead')->get();
            foreach ($bunnies as $bunny){
                $bunny->breed = 'Lion';
                $bunny->save();
            }
        Bunny::dump();
        Practice::resetDatabase();
    }
}
