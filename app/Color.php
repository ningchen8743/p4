<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function bunnies()
    {
        return $this->belongsToMany('App\bunny')->withTimestamps();
    }

    public static function getForCheckboxes()
    {
        $colors = self::orderBy('name')->get();

        $colorsForCheckboxes = [];

        foreach ($colors as $color) {
            $colorsForCheckboxes[$color['id']] = $color->name;
        }

        return $colorsForCheckboxes;
    }
}
