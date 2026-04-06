<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    //
    public function index(){
        $movie = DB::select("SELECT * FROM movie WHERE popularity > 450 AND vote_average > 7 ORDER BY release_date DESC LIMIT 12;");
        return view("movie.index",compact("movie"));
    }
}
