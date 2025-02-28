<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = request()->validate([
            'name' => 'required|min:3|max:255',
            'bio' => 'nullable|min:5|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = User::findOrFail($id);
        if(request()->hasFile('image')){
            $imagePath = request('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
            Storage::disk('public')->delete($user->image);
        }

        User::updateOrCreate(['id' => $id], $validated);
        return redirect()->route('users.show', $id)->with('success', 'Profile updated successfully');
    }

    public function profile() {
        return $this->show(auth()->user()->id);
    }
}
