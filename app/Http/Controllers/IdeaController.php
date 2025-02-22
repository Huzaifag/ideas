<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){
        //dump(request()->get("content"));
        request()->validate([
            'content' => 'required|min:3|max:255',
        ]);
        $idea = Idea::create([
            'content' => request()->get('content', 'No content'),
        ]);

       return redirect(route('home'))->with('success', 'Idea created Successfully');
    }

    public function destroy($id){
        Idea::where('id', $id)->firstOrFail()->delete();
        return redirect(route('home'))->with('success', 'Idea deleted Successfully');
    }

    public function show(Idea $idea){
        return view('idea.show', compact('idea'));
    }
}
