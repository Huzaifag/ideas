<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $followersIds = auth()->user()->followings()->pluck('user_id');
        $ideas = Idea::whereIn('user_id', $followersIds)->latest();
        if (request()->has('search')) {
            $ideas = Idea::where('content', 'LIKE', '%' . request()->get('search') . '%')->orderBy('created_at','desc');
        }
        return view('welcome', ['ideas' => $ideas->paginate(5)]);
    }
}
