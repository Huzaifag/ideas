<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class LikesController extends Controller
{
    public function like(Idea $idea){
        $liker = auth()->user();
        $liker->likes()->attach($idea);
        return redirect()->back()->with('success', 'Idea liked successfully');
    }
    public function unlike(Idea $idea){
        $liker = auth()->user();
        $liker->likes()->detach($idea);
        return redirect()->back()->with('success', 'Idea liked successfully');
    }
}
