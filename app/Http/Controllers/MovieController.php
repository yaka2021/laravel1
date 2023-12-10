<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{ 
    public function index(Request $request)
    {

        $keyword = $request->input('keyword');
        $is_showing = $request->input('is_showing');

        $query = Movie::query();

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%$keyword%")
                    ->orWhere('description', 'like', "%$keyword%");
            });
        }

        if ($is_showing != null && $is_showing != "on") {
            $query->where('is_showing', $is_showing);
        }

        $movies = $query->paginate(20);

        return view('movies', [
            'movies' => $movies
        ]);
    }
}