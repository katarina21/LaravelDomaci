<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Breed;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $breed1=Breed::create([
            'name' => "husky"
        ]);

        $breed2=Breed::create([
            'name' => "boxer"
        ]);

        $breed3=Breed::create([
            'name' => "akita"
        ]);

        $breed4=Breed::create([
            'name' => "beagle"
        ]);
    }
}
