<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = Type::all()->pluck('id');
        $users = User::all()->pluck('id');

        for ($i=0; $i < 200; $i++) {
            $newProject = new Project();
            $newProject->type_id = $faker->randomElement($types);
            $newProject->title = $faker->slug(2);
            $newProject->user_id = $faker->randomElement($users);
            $newProject->add_devs = $faker->name();
            $newProject->description = $faker->realText(800);
            $newProject->date = $faker->date();
            $newProject->github = $faker->url();
            $newProject->image = $faker->imageUrl(800, 400, 'projects');
            $newProject->save();
        }
    }
}
