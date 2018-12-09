<?php

use Illuminate\Database\Seeder;
use App\Color;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = ['white', 'black', 'grey', 'beige', 'brown', 'monochrome', 'color block', 'gradient'];

        foreach ($colors as $colorName) {
            $color = new Color();
            $color->name = $colorName;
            $color->save();
        }
    }
}
