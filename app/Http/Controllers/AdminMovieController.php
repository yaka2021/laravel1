<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;


class AdminMovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('/Admin/movies', ['movies' => $movies]);
    }

    public function create()
    {
        return view('/Admin/moviesCreate');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:movies',
            'image_url' => 'required|url',
            'published_year' => 'required|integer',
            'description' => 'required',
            'is_showing' => 'required|boolean',
        ]);

        $movie = new Movie();
        $movie->title = request('title');
        $movie->image_url = request('image_url');
        $movie->published_year = request('published_year');
        $movie->is_showing = request('is_showing');
        $movie->description = request('description');
        $movie->save();

        return redirect('/admin/movies')->with('flash_message', '映画作品リストへの登録が完了しました');
    }
    public function edit($id)
    {
        $movie = Movie::find($id);
        if (empty($movie)){abort("404");}
        return view("/Admin/movieEdit",compact('movie'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'title' => 'required|unique:movies',
            'image_url' => 'required|url',
            'published_year' => 'required|integer',
            'description' => 'required',
            'is_showing' => 'required|boolean',
        ]);

        $movie = Movie::find($id);
        if (empty($movie)){abort("404");}
        $movie->title = request('title');
        $movie->image_url = request('image_url');
        $movie->published_year = request('published_year');
        $movie->is_showing = request('is_showing');
        $movie->description = request('description');
        $movie->save();

        return redirect('/admin/movies')->with('flash_message', '更新が完了しました');
    }

    public function destroy($id){
        $movie = Movie::find($id);
        if (empty($movie)){abort("404");}
        $movie->delete();

        return redirect('/admin/movies')->with('flash_message', '削除が完了しました');
    }
}