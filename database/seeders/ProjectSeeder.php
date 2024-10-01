<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helper;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // importo il config
        $projects = config('projects');

        // Genera 100 progetti casuali
        for ($i = 1; $i <= 100; $i++) {
            // Seleziona un progetto casuale dalla configurazione
            $randomProject = $projects[array_rand($projects)];

            // Crea il progetto utilizzando i dati della configurazione
            $project = Project::create([
                'name' => $randomProject['name'] . ' ' . $i,
                'description' => $randomProject['description'],
                'slug' => Helper::generateSlug($randomProject['name'] . ' ' . $i, Project::class),
                'type_id' => Type::all()->random()->id,
            ]);

            // Associa tecnologie casuali al progetto
            $technologyIds = Technology::all()->random(rand(1, 3))->pluck('id');
            $project->technologies()->attach($technologyIds);
        }
    }
}
