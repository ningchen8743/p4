<?php

namespace App\Http\Controllers;

use App\Utilities\Practice;
use Illuminate\Http\Request;
use App\Bunny;
use App\Color;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function initializeView()
    {
        $colors = Color::all();
        return view('bunnyshelter.searchbunny')->with([
            'colors' => $colors,
        ]);
    }

    public function searchBunny(Request $request)
    {
        // extract data from quest
        $breeds = $request->input('breed', [
            'Netherland Dwarf', 'Lop', 'Lionhead']);
        $buckOrDoe = $request->input('buckOrDoe');

        $colors = Color::all();
        $colorArray = array();
        foreach($colors as $item)
        {
            array_push($colorArray, $item->name);
        }

        $colorsToSearch = $request->input('color', $colorArray);


        // breed query
        $result = Bunny::query();
        $result->where(function ($_q) use ($breeds) {
            foreach ($breeds as $breed) {
                $_q->orWhere('breed', '=', $breed);
            }
        });

        // sex query
        if($buckOrDoe == 'buck' || $buckOrDoe == 'doe')
        {
            $result->where('sex', '=', $buckOrDoe);
        }
        // $buckOrDoe == 'both' do nothing

        // age query
        $bunnies_temp = $result->get();
        $bunnies = collect();
        $age_range = $request->input('age', 'any');
        $now = Carbon::now();
        foreach($bunnies_temp as $bunny)
        {
            $past = Carbon::parse($bunny->dob);
            $ageInMonths = $now->diffInMonths($past);

            if($age_range == 'Younger than 1 year old')
            {
                if($ageInMonths < 12.0)
                {
                    $bunnies->push($bunny);
                }
            }
            elseif($age_range == 'Older than 1 year old')
            {
                if($ageInMonths >= 12.0)
                {
                    $bunnies->push($bunny);
                }
            }
            else // 'any'
            {
                $bunnies->push($bunny);
            }
        }

        // color query
        $bunnies_temp = $bunnies;
        $bunnies = collect();
        // iterate all bunnies
        foreach($bunnies_temp as $bunny)
        {
            $found = FALSE;
            if($colorsToSearch === $colorArray){
                $found = TRUE;
            }else{
                // for each bunny, iterate all colors it has
                foreach($bunny->colors as $colorObj)
                {
                    // iterate all colors available in the color table
                    foreach($colorsToSearch as $targetColor)
                    {
                        if($colorObj->name == $targetColor)
                        {
                            $found = TRUE;
                        }
                    }
                }
            }

            if($found == TRUE)
            {
                $bunnies->push($bunny);
            }
        }

        if($bunnies->count() == 0)
        {
            return view('bunnyshelter.searchbunny')->with([
                'bunnies' => $bunnies,
                'alert' => 'Sorry! Your preferred bunny is not found, please give another try:)'
            ]);
        }
        else
        {
            session()->flash('breeds_cache', implode(" ", $breeds));
            session()->flash('buckOrDoe_cache', $buckOrDoe);
            session()->flash('colorsToSearch_cache', implode(" ", $colorsToSearch));
            session()->flash('age_range_cache', $age_range);

            return view('bunnyshelter.searchbunny')->with([
                'bunnies' => $bunnies,
                'alert' => 'These are the bunnies you like',
                'colors' => $colors,
            ]);
        }
    }
}
