<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Idea extends Model
{

    protected $with = ['user:id,name,image', 'comments.user:id,name,image'];
    protected $fillable = [
        'user_id',
        'content',
        'likes',
    ];

    public function comments() : HasMany{
        return $this->hasMany(Comment::class);
    }

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
}
