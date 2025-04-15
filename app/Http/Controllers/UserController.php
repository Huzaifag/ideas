<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('update', User::findOrFail($id));
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $this->authorize('update', User::findOrFail($id));
        $validated = $request->validated();
        $user = User::findOrFail($id);
        if($request->hasFile('image')){
            $imagePath = request('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
            if($user->image){
                Storage::disk('public')->delete($user->image);
            }
        }

        User::updateOrCreate(['id' => $id], $validated);
        return redirect()->route('users.show', $id)->with('success', 'Profile updated successfully');
    }

    public function profile() {
        return $this->show(auth()->user()->id);
    }
}
