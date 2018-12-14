<?php

use Illuminate\Database\Seeder;
use App\Bunny;
use App\Color;

class BunnyColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bunnies =[
            'Sherman' => ['brown'],
            'Trueman' => ['black'],
            'Sunny' => ['white', 'brown'],
            'Sherry' => ['black'],
            'Chester' => ['white','brown'],
            'Amy' => ['white', 'brown'],
            'Hector' => ['white', 'black'],
            'Benny' => ['grey'],
            'Meatloaf' => ['brown', 'black'],
            'Matty' => ['brown'],
            'Dane' => ['white','grey'],
            'Kikko' => ['brown','black'],
            'Nick' => ['white', 'black'],
            'Snuffles' => ['white', 'brown'],
            'Kyle' => ['white', 'brown'],
            'Rooney' => ['grey'],
            'Bailey' => ['grey'],
            'Ellie' => ['white', 'brown'],
            'Max' => ['white'],
            'Guimauve' => ['white'],
            'Jake' => ['grey', 'black'],
            'Sunday' => ['white', 'brown'],
            'Reese' => ['white', 'brown'],
            'Velvet' => ['white', 'grey'],
            'Bernie' => ['white', 'grey'],
            'Brosnan' => ['brown', 'grey'],
            'Bun' => ['brown', 'grey'],
            'Lilac' => ['brown', 'white'],
        ];


        foreach ($bunnies as $name => $colors) {

            $bunny = Bunny::where('name', 'like', $name)->first();

            foreach ($colors as $colorName) {
                $color = Color::where('name', 'LIKE', $colorName)->first();

                # Connect this tag to this book
                $bunny->colors()->save($color);
            }
        }
    }
}
