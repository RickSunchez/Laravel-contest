<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videogames extends Model
{
    public $timestamps = true;
    protected $fillable = ['title', 'developer', 'tags'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $casts = [
        'tags' => 'array',
    ];
    use HasFactory;
}
