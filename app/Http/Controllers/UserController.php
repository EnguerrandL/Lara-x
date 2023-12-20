<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{




    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        $ideas = $user->ideas()->paginate(5);

        return view('user.show', [
            'user' => $user,
            'ideas' => $ideas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        $editing = true;

        return view('user.edit', [
            'user' => $user,
            'editing' => $editing,
            'ideas' => $ideas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $validated = request()->validate([
            'name' => 'required',
            'bio' => 'nullable',
            'image' => 'image',
        ]);

        if (request()->has('image')) {
            $imagePath = request()->file('image')->store('profile-picture', 'public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image);
        }

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile updated !');
    }


    public function profile()
    {



        return $this->show(auth()->user());
    }
}
