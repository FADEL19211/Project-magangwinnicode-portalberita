<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'news_id', 'comment'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function news()
    {
        return $this->belongsTo(\App\Models\News::class);
    }
}
