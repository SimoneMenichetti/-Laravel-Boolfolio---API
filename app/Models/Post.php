<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'slug',
        'topic',
        'start_date',
        'end_date',
        'number_of_posts',
        'collaborators',
    ];
}
