<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curriculums'; // Explicitly define the table name
    protected $fillable = ['name'];

    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }
}