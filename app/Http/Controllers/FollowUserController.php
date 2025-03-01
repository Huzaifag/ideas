<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowUserController extends Controller
{
    public function follow(User $user){
        Auth::user()->followings()->attach($user);
        return redirect(route('users.show', $user->id))->with('success','You are now following this user');
    }
    public function unfollow(User $user){
        Auth::user()->followings()->detach($user);
        return redirect(route('users.show', $user->id))->with('success','You have unfollowed this user');
    }
}
