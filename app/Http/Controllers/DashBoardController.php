<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(){
        $ideas = Idea::orderBy('created_at', 'desc');
        if (request()->has('search')) {
            $ideas = Idea::where('content', 'LIKE', '%' . request()->get('search') . '%')->orderBy('created_at','desc');
        }
        return view('welcome', ['ideas' => $ideas->paginate(5)]);
    }
}
