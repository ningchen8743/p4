<?php

namespace App\Utilities;

use Artisan;

class Practice
{
    public static function resetDatabase()
    {
        dump('Clearing and re-seeding database');
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
    }
}