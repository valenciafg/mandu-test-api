<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Subdivision;
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

        Division::factory(50)->create();
        $divisions = Division::factory(3)->create();
        Division::all()->each(function ($division) use ($divisions){
            // $division->superior_division()->associate(Division::factory(1)->create()->id)->save();
            $division->subdivisions()->saveMany($divisions);
        });
    }
}
