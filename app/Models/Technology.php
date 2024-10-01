<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    // aggiungiamo le fillable

    protected $fillable =  ['name', 'slug', 'description'];

    // ed inserialo la relazione many to many con il model project

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_technology');
    }
}
