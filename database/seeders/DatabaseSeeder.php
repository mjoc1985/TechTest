<?php

namespace Database\Seeders;

use App\Models\Coffee;
use App\Models\Options;
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
        // \App\Models\User::factory(10)->create();

        // Seed Coffee and Options tables
        Coffee::create([
            'name' => 'Standard Coffee',
            'qty' => 10
        ]);
        Coffee::create([
            'name' => 'Strong Coffee',
            'qty' => 10
        ]);

        Options::create([
           'name' => 'Sugar',
           'qty' => 20,
        ]);
        Options::create([
            'name' => 'Milk',
            'qty' => 20,
        ]);
        Options::create([
            'name' => 'Sweetener',
            'qty' => 20,
        ]);

    }
}
