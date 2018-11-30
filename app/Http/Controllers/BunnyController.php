<?php

namespace App\Http\Controllers;

use App\Bunny;

class BunnyController extends Controller {

    public function index()
    {
        $bunnies = Bunny::all();

        return view('bunnyshelter.index')->with([
            'bunnies' => $bunnies
        ]);
    }

}