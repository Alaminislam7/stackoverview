<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;

class FavouriteController extends Controller
{

    public function store(Question $question)
    {
        $question->favorites()->attach(auth()->id());

        if (request()->expectsJson()) {
            return response()->json(null, 204);
        }
        return back();
    }

    public function destroy(Question $question)
    {
        $question->favorites()->detach(auth()->id());
        
        if (request()->expectsJson()) {
            return response()->json(null, 204);
        }

        return back();
    }
}
