<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    public function store(){
        //dump(request()->get("content"));
        request()->validate([
            'content' => 'required|min:3|max:255',
        ]);
        $idea = Idea::create([
            'user_id' => auth()->id(),
            'content' => request()->get('content', 'No content'),
        ]);

       return redirect(route('home'))->with('success', 'Idea created Successfully');
    }

    public function destroy($id){
        $idea = Idea::findOrFail($id);

        // if($idea->user_id != auth()->id()){
        //     abort(404);
        // }
        if(Gate::denies('delete.idea', $idea)){
            abort(403);
        }
        Idea::where('id', $id)->firstOrFail()->delete();
        return redirect(route('home'))->with('success', 'Idea deleted Successfully');
    }

    public function show(Idea $idea){
        return view('idea.show', compact('idea'));
    }

    public function edit(Idea $idea){
        // if($idea->user_id !== auth()->id()){
        //    abort(404);
        // }

        // if(!Gate::allows('delete.idea', $idea)){
        //     abort(404);
        // }
        Gate::authorize('edit.idea', $idea);
        $editing = true;
        return view('idea.show', compact('idea', 'editing'));
    }
    public function update(Idea $idea){
        //dump(request()->get("content"));
        request()->validate([
            'content' => 'required|min:3|max:255',
        ]);
        $idea->content = request()->get('content');
        $idea->save();

       return redirect(route('home'))->with('success', 'Idea updated Successfully');
    }
}
