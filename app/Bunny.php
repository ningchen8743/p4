<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bunny extends Model
{
    public static function dump($bunnies=null)
    {
        $data=[];

        if(is_null($bunnies)){
            $bunnies = self::all();
        }

        foreach ($bunnies as $bunny){
            $data[] = $bunny->name . ' breed changed to ' . $bunny->breed;
        }

        dump($data);
    }
}
