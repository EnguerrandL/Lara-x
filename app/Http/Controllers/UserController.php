<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

        return view('user.show', [
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
        //
    }


}
