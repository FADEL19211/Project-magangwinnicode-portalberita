<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'category', 'image'];

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }
}
