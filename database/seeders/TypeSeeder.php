<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helper;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $types = config('types');

        foreach ($types as $typeName) {
            Type::create([
                'name' => $typeName,
                'slug' => Helper::generateSlug($typeName, Type::class),
                'description' => 'Descrizione' . $typeName,
            ]);
        }
    }
}
