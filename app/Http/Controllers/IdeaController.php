<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(Request $request){

      
        request()->validate([
            'content' => 'required|min:2',
        ]);

        $idea =  Idea::create([
            'content' => $request->content
        ]);

        $idea->save();

        return back()->with('success', 'Idea added !');
    }


    public function delete($id){


       $idea = Idea::where('id', $id)->firstOrFail();

        $idea->delete();


        return back()->with('success', 'Idea deleted !');

    }
}
