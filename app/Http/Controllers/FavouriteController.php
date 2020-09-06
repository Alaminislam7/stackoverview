<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;

class FavouriteController extends Controller
{

    public function store(Question $question)
    {
        $question->favorites()->attach(auth()->id());

        return back();
    }

    public function destroy(Question $question)
    {
        $question->favorites()->detach(auth()->id());

        return back();
    }
}
