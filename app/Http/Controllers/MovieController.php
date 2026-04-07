<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    //
    public function index()
    {
        $movie = DB::select("SELECT * FROM movie WHERE status = 1 AND popularity > 450 AND vote_average > 7 ORDER BY release_date DESC LIMIT 12;");
        return view("movie.index", compact("movie"));
    }

    public function show($id)
    {
        $movie1 = DB::select("SELECT m.id AS movie_id, m.image, m.movie_name_vn, m.release_date FROM movie m
                INNER JOIN movie_genre mg ON m.id=mg.id_movie
                INNER JOIN genre g ON mg.id_genre=g.id
                WHERE m.status=1 AND g.id=?
                ORDER BY m.release_date DESC
                LIMIT 12;", [$id]);
        return view("movie.show", compact("movie1"));
    }
    public function info_movie($id)
    {
        $movie2 = DB::select("SELECT * FROM movie WHERE id=? AND status = 1", [$id]);
        return view("movie.info_movie", compact("movie2"));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $movie3 = DB::select("SELECT * FROM movie WHERE movie_name_vn LIKE ? AND status = 1", ['%' . $keyword . '%']);
        return view("movie.search", compact("movie3"));
    }
}
