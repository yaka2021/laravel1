<?php

namespace App\Http\Controllers;
use App\Models\Movie;

class AdminMovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('adminMovies', ['movies' => $movies]);
    }
}