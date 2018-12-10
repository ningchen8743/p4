<?php

namespace App\Http\Controllers;

use App\Utilities\Practice;
use Illuminate\Http\Request;
use App\Bunny;
use App\Color;

class SearchController extends Controller
{
    public function searchBunny(Request $request)
    {
        // extract data from quest
        $breeds = $request->input('breed', [
            'Netherland Dwarf', 'Lop', 'Lionhead', 'Rex',
            'Angora', 'Jersey Wooly']);
        $buckOrDoe = $request->input('buckOrDoe');

        $colors = Color::getForCheckboxes();
        dump($colors);


        // perform query
        $result = Bunny::query();
        $result->where(function ($_q) use ($breeds) {
            foreach ($breeds as $breed) {
                $_q->orWhere('breed', '=', $breed);
            }
        });


        if($buckOrDoe == 'buck' || $buckOrDoe == 'doe')
        {
            $result->where('sex', '=', $buckOrDoe);
        }
        // $buckOrDoe == 'both' do nothing


        $bunnies = $result->get();
        if($bunnies->count() == 0)
        {
            return view('bunnyshelter.searchbunny')->with([
                'bunnies' => $bunnies,
                'alert' => 'Sorry! Your preferred bunny is not found, please give another try:)'
            ]);
        }
        else
        {
            return view('bunnyshelter.searchbunny')->with([
                'bunnies' => $bunnies,
                //'buckOrDoe' => $buckOrDoe,
                //'breeds' => $breeds,
                'alert' => 'These are the bunnies you like'
            ]);
        }
    }
}
