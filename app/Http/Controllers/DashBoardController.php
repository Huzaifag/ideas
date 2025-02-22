<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(){

        return view('welcome', ['ideas' => Idea::orderBy('created_at', 'desc')->paginate(5)]);
    }
}
