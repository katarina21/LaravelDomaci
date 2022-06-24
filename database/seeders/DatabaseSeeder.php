<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dog;
use App\Models\User;
use App\Models\Breed;
use App\Models\Owner;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Dog::truncate();
        User::truncate();
        Owner::truncate();
        Breed::truncate();

        $this->call([
            BreedSeeder::class
        ]);

        Dog::factory(10)->create();
    }
}
