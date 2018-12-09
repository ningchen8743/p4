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
            'Sherman' => ['beige', 'brown', 'gradient'],
            'Trueman' => ['black', 'monochrome'],
            'Sunny' => ['white', 'beige', 'color block'],
            'Sherry' => ['black', 'monochrome'],
            'Chester' => ['beige', 'brown','gradient'],
            'Amy' => ['white', 'beige','color block'],
            'Hector' => ['white', 'black','color block'],
            'Benny' => ['grey', 'monochrome'],
            'Meatloaf' => ['beige', 'brown','gradient'],
            'Matty' => ['beige','monochrome'],
            'Dane' => ['white','grey','color block'],
            'Kikko' => ['beige', 'brown','gradient'],
            'Nick' => ['white', 'black','color block'],
            'Snuffles' => ['white', 'brown','color block'],
            'Kyle' => ['white', 'brown','color block'],
            'Rooney' => ['grey', 'gradient'],
            'Bailey' => ['grey', 'monochrome'],
            'Ellie' => ['white', 'beige', 'gradient'],
            'Max' => ['white', 'monochrome'],
            'Guimauve' => ['white', 'monochrome'],
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
