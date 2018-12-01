<?php

namespace App\Http\Controllers;

use App\Bunny;

use Illuminate\Http\Request;

class BunnyController extends Controller {

    public function index()
    {
        $bunnies = Bunny::all();

        return view('bunnyshelter.index')->with([
            'bunnies' => $bunnies
        ]);
    }

    public function showeach(Request $request, $id)
    {
        $bunny = Bunny::find($id);

        return view('bunnyshelter.showeach')->with([
            'bunny' => $bunny
        ]);
    }

    public function create(Request $request)
    {
        return view('bunnyshelter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sex' => 'required',
            'dob' => 'required',
            'breed' => 'required',
            'color' => 'required',
            'photo_url' => 'required',
        ]);

        $bunny = new Bunny();
        $bunny->name = $request->input('name');
        $bunny->sex = $request->input('sex');
        $bunny->dob = $request->input('dob');
        $bunny->breed = $request->input('breed');
        $bunny->color = $request->input('color');
        $bunny->photo_url = $request->input('photo_url');
        $bunny->save();

        return redirect('/all')->with([
            'alert' => 'Your record was added.'
        ]);

    }

}