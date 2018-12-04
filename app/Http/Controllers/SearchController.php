<?php

namespace App\Http\Controllers;

use App\Utilities\Practice;
use Illuminate\Http\Request;
use App\Bunny;

class SearchController extends Controller
{
    public function searchBunny(Request $request)
    {
        $buckOrDoe = $request->input('buckOrDoe');

        if($buckOrDoe == 'buck')
        {
            $bunnies = Bunny::where('sex', '=', 'buck')->get();
        }
        elseif($buckOrDoe == 'doe')
        {
            $bunnies = Bunny::where('sex', '=', 'doe')->get();
        }
        else // $buckOrDoe == 'both'
        {
            $bunnies = Bunny::all();
        }

        // $bunnies = Bunny::where('breed', '=', '')->get();


        if (!$bunnies)
        {
            return view('bunnyshelter.searchbunny')->with([
                'alert' => 'The record is not found.'
            ]);
        }

        return view('bunnyshelter.searchbunny')->with([
            'bunnies' => $bunnies,
            'buckOrDoe' => $buckOrDoe,
            'alert' => 'These are the bunnies you like'
        ]);
    }
}
