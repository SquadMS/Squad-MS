<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use SquadMS\Foundation\Database\Seeders\SquadMSSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
             SquadMSSeeder::class,
        ]);
    }
}
