<?php

namespace App\Http\Controllers;

use App\Bunny;

use Illuminate\Http\Request;

use Validator;

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

    public function initializeView(Request $request)
    {
        $name = $request->session()->get('name', '');
        $sex = $request->session()->get('sex', '');
        $dob = $request->session()->get('dob', '');
        $breed = $request->session()->get('breed', '');
        $adoptionStatus = $request->session()->get('adoption_status', '');
        $photoUrl = $request->session()->get('photo_url', '');

        return view('bunnyshelter.create')->with([
            'name' => $name,
            'sex' => $sex,
            'dob' => $dob,
            'breed' => $breed,
            'adoption_status' => $adoptionStatus,
            'photo_url' => $photoUrl
        ]);
    }

    public function store(Request $request)
    {
        $validator= Validator::make ($request->all(),[
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'sex' => 'required|alpha',
            'dob' => 'required|date_format:Y-m-d',
            'breed' => 'required|regex:/^[\pL\s\-]+$/u',
            'adoption_status' => 'required|alpha',
            'photo_url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return redirect('/create')->withErrors($validator)->withInput();
        }else {
            $bunny = new Bunny();
            $bunny->name = $request->input('name');
            $bunny->sex = $request->input('sex');
            $bunny->dob = $request->input('dob');
            $bunny->breed = $request->input('breed');
            $bunny->adoption_status = $request->input('adoption_status');
            $bunny->photo_url = $request->input('photo_url');
            $bunny->save();

            return redirect('/all')->with([
                'alert' => 'Your record was added.'
            ]);
        }

    }

    public function edit($id)
    {
        $bunny = Bunny::find($id);
        if (!$bunny) {
            return redirect('/all')->with([
                'alert' => 'The record is not found.'
            ]);
        }
        return view('bunnyshelter.edit')->with([
            'bunny' => $bunny
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'sex' => 'required|alpha',
            'dob' => 'required|date_format:Y-m-d',
            'breed' => 'required|regex:/^[\pL\s\-]+$/u',
            'adoption_status' => 'required|alpha',
            'photo_url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return redirect('/all/'.$id.'/edit')->withErrors($validator)->withInput();
        } else {
            $bunny = Bunny::find($id);
            $bunny->name = $request->input('name');
            $bunny->sex = $request->input('sex');
            $bunny->dob = $request->input('dob');
            $bunny->breed = $request->input('breed');
            $bunny->adoption_status = $request->input('adoption_status');
            $bunny->photo_url = $request->input('photo_url');
            $bunny->save();

            return redirect('/all/'.$id)->with([
                'alert' => 'You have updated bunny information!'
            ]);
        }
    }

    public function delete($id)
    {
        $bunny = Bunny::find($id);

        if (!$bunny) {
            return redirect('/all')->with([
                'alert' => 'The record is not found.'
            ]);
        }

        return view('bunnyshelter.delete')->with([
            'bunny' => $bunny,
        ]);
    }

    public function destroy($id)
    {
        $bunny = Bunny::find($id);
        $bunny->delete();
        return redirect('/all')->with([
            'alert' => 'The adopted bunny profile has been deleted.',
        ]);
    }

}