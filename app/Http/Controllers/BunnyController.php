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
        $user = $request->user();
        $donations = $user->donations()->get();


        return view('bunnyshelter.donate')->with([
            'donations' => $donations,
        ]);
    }

    public function store(Request $request)
    {
        $validator= Validator::make ($request->all(),[
            'value' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect('/donate')->withErrors($validator)->withInput();
        }else {

            return redirect('/donate')->with([
                'alert' => 'Your donation record was added to the list.'
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
        $adoption_status = $bunny->adoption_status;
        if ($adoption_status!='adopted') {
            return redirect('/all/'.$id)->with([
                'alert' => 'Only adopted bunny record can be deleted.'
            ]);
        }
        $bunny->colors()->detach();
        $bunny->delete();
        return redirect('/all')->with([
            'alert' => 'The adopted bunny profile has been deleted.',
        ]);
    }

}