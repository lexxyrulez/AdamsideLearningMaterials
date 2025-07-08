<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'grade_id', 'curriculum_ids', 'content', 'type'];

    protected $casts = [
        'curriculum_ids' => 'array',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}