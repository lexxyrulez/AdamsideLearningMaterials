<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['title', 'file_path'];

    public function grades()
    {
        return $this->belongsTo(Grade::class);
    }

    public function curriculums()
    {
        return $this->belongsToMany(Curriculum::class);
    }
}