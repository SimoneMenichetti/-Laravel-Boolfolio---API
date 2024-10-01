<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'slug', 'type_id', 'path_image', 'image_original_name'];

    /**
     * Define the relationship with Type.
     */

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // inseriamo la relazione della pivot table

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'project_technology');
    }
}
