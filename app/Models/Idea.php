<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Idea extends Model
{

    protected $with = ['user:id,name,image', 'comments.user:id,name,image'];
    protected $withCount = ['likes', 'comments'];
    protected $fillable = [
        'user_id',
        'content',
    ];

    public function comments() : HasMany{
        return $this->hasMany(Comment::class);
    }

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }
}
