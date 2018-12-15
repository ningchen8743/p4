<?php

use Illuminate\Database\Seeder;
use App\Donation;

class DonationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $donations = ['5', '10', '15', '20', '25', '50'];

        foreach ($donations as $donationAmount) {
            $donation = new Donation();
            $donation->amount = $donationAmount;
            $donation->user_id = 1;
            $donation->save();
        }
    }
}
