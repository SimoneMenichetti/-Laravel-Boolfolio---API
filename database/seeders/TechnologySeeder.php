<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// importiamo il model Technology
use App\Models\Technology;
// importo helper per lo slug
use App\Functions\Helper;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = config('technologies');


        // inizializzo il foreach

        foreach ($technologies as $technologyName) {
            $technology = new Technology();
            $technology->name = $technologyName['name'];
            $technology->slug = Helper::generateSlug($technologyName['name'], Technology::class);
            $technology->save();
        }
    }
}
