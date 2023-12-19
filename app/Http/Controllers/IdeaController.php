<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{




    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea,
        ]);
    }


    public function edit(Idea $idea)
    {

        $editing  = true;

        return view('ideas.edit', [
            'idea' =>   $idea,
            'editing' => $editing,
        ]);
    }



    public function update(Idea $idea)
    {

        $data =  request()->validate([
            'content' => 'required|min:2',
        ]);

        $idea->update($data);


        return to_route('index')->with('success',  'Idea with id N° ' . $idea->id . ' updated with success');
    }

    public function store()
    {


        $validate =    request()->validate([
            'content' => 'required|min:2',
        ]);

        $idea =  Idea::create($validate);

        $idea->save();

        return back()->with('success', 'Idea added !');
    }


    public function delete(Idea $idea)
    {


        $idea->delete();


        return back()->with('success', 'Idea deleted !');
    }
}
