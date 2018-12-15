<?php

namespace App\Http\Controllers;

use App\Bunny;

use Illuminate\Http\Request;

use Validator;

use App\Donation;
use App\User;

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
        $request->validate([
            'amount' => 'required|integer',
        ]);

        $donation = new Donation();
        $donation->amount = $request->input('amount');
        $donation->user_id = $request->user()->id;
        $donation->save();

        return redirect('/donate')->with([
            'alert' => 'Your donation record was added to the list.',
            'donation' => $donation,
        ]);
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
        $adoption_status = $request->input('adoptableOrAdopted');

        $bunny = Bunny::find($id);
        $bunny->adoption_status = $adoption_status;
        $bunny->save();

        if($adoption_status == 'adopted')
        {
            return view('bunnyshelter.showeach')->with([
                'alert' => 'You just adopted the bunny!',
                'bunny' => $bunny,
            ]);
        }
        else // adoptable
        {
            return view('bunnyshelter.showeach')->with([
                'alert' => 'You did not adopt the bunny.',
                'bunny' => $bunny,
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