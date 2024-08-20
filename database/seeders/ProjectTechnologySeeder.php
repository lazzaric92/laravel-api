<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // for each project there will be x technologies
        $projects = Project::all();
        $technologies = Technology::all()->pluck('id');

        foreach ($projects as $project){
            // attach technologies id/s
            $project->technologies()->attach($faker->randomElements($technologies, rand(2,4)));
        }
    }
}
