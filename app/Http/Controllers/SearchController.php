<?php

namespace App\Http\Controllers;

use App\Utilities\Practice;
use Illuminate\Http\Request;
use App\Bunny;
use App\Color;
use Carbon\Carbon;

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

        $bunnies_temp = $result->get();
        $bunnies = collect();
        $age_range = $request->input('age', 'any');
        $now = Carbon::now();
        foreach($bunnies_temp as $bunny)
        {
            $past = Carbon::parse($bunny->dob);
            $ageInMonths = $now->diffInMonths($past);

            if($age_range == 'less_than_1_year')
            {
                if($ageInMonths < 12.0)
                {
                    $bunnies->push($bunny);
                }
            }
            elseif($age_range == 'more_than_1_year')
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
                'age_range' => $age_range,
                'alert' => 'These are the bunnies you like'
            ]);
        }
    }
}
