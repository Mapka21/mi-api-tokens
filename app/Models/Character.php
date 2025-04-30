<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
    ];

    public function media()
    {
        return $this->belongsToMany(Media::class);
    }
}
