<?php

namespace App\Functions;

use Illuminate\Support\Str;

class Helper
{
    public static function generateSlug($title, $model, $separator = '-')
    {
        $slug = Str::slug($title, $separator);
        $original_slug = $slug;
        $counter = 1;

        // Limita la lunghezza dello slug a 250 caratteri
        $slug = substr($slug, 0, 250);

        // Controlla se esiste un slug nel modello specificato
        while ($model::where('slug', $slug)->exists()) {
            $slug = $original_slug . $separator . $counter;
            // Limita la lunghezza dello slug a 250 caratteri
            $slug = substr($slug, 0, 250);
            $counter++;
        }

        return $slug;
    }
}
