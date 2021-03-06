<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DonationsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(BunniesTableSeeder::class);
        $this->call(BunnyColorTableSeeder::class);
    }
}
