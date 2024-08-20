<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologiesData = [
            [
                'name' => 'HTML',
                'color' => '#E34F26', // Colore caratteristico di HTML
            ],
            [
                'name' => 'CSS',
                'color' => '#1572B6', // Colore caratteristico di CSS
            ],
            [
                'name' => 'JavaScript',
                'color' => '#F7DF1E', // Colore caratteristico di JavaScript
            ],
            [
                'name' => 'VueJS',
                'color' => '#4FC08D', // Colore caratteristico di VueJS
            ],
            [
                'name' => 'PHP',
                'color' => '#777BB4', // Colore caratteristico di PHP
            ],
            [
                'name' => 'Python',
                'color' => '#3776AB', // Colore caratteristico di Python
            ],
            [
                'name' => 'Java',
                'color' => '#007396', // Colore caratteristico di Java
            ],
            [
                'name' => 'C++',
                'color' => '#00599C', // Colore caratteristico di C++
            ],
            [
                'name' => 'Ruby',
                'color' => '#CC342D', // Colore caratteristico di Ruby
            ],
            [
                'name' => 'Swift',
                'color' => '#FA7343', // Colore caratteristico di Swift
            ],
            [
                'name' => 'TypeScript',
                'color' => '#3178C6', // Colore caratteristico di TypeScript
            ],
            [
                'name' => 'Go',
                'color' => '#00ADD8', // Colore caratteristico di Go
            ],
            [
                'name' => 'C#',
                'color' => '#239120', // Colore caratteristico di C#
            ],
            [
                'name' => 'Kotlin',
                'color' => '#0095D5', // Colore caratteristico di Kotlin
            ],
            [
                'name' => 'SQL',
                'color' => '#336791', // Colore caratteristico di SQL
            ],
            [
                'name' => 'Laravel',
                'color' => '#FF2D20', // Colore caratteristico di Laravel
            ],
            [
                'name' => 'Blade',
                'color' => '#F7523F', // Colore caratteristico di Blade
            ],
            [
                'name' => 'Sass',
                'color' => '#CC6699', // Colore caratteristico di Sass
            ],
        ];

        foreach ($technologiesData as $technologyData) {
            Technology::create($technologyData);
        }

    }
}
