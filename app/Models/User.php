<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'image',
        'bio',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function ideas(): HasMany{
       return $this->hasMany(Idea::class);
    }

    public function comments(): HasMany{
        return $this->hasMany(Comment::class);
     }

    public function getImageURL(){
        if($this->image){
            return asset('storage/' . $this->image);
        }else{
            return asset("https://api.dicebear.com/6.x/fun-emoji/svg?seed={ $this->name }");
        }
    }

    public function followings(): BelongsToMany{
        return $this->belongsToMany(User::class, 'folow_user', 'follower_id', 'user_id');
    }
    public function followers(): BelongsToMany{
        return $this->belongsToMany(User::class, 'folow_user', 'user_id', 'follower_id');
    }

    public function follows(User $user){
        return $this->followings()->where('user_id', $user->id)->exists();
    }
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(Idea::class, 'idea_like')->withTimestamps();
    }

    public function hasLiked(Idea $idea){
        return $this->likes()->where('idea_id', $idea->id)->exists();
    }
}
