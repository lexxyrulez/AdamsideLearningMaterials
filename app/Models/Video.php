<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'youtube_id', 'description'];
    protected $dates = ['deleted_at']; // Optional, handled by SoftDeletes
}