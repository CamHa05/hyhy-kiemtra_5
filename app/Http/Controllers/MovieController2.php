<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MovieController2 extends Controller
{
    function movieList()
    {
        $data = DB::table('movie')->get();
        return view('movie-manage.movie-list', compact('data'));
    }
    function movieCreate()
    {
        return view('movie-manage.movie-create');
    }
    function movieSave(Request $request)
    {
        $request->validate(
            [
                'movie_name' => ['required', 'string', 'max:255'],
                'movie_name_vn' => ['required', 'string', 'max:255'],
                'release_date' => ['required', 'date_format:Y-m-d'],
                'tagline_vn' => ['required', 'string', 'max:255'],
                'image' => ['required_without:image_link', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                'image_link' => ['required_without:image']
            ],
            [
                'release_date.date_format' => 'Ngày phát hành phải theo định dạng Năm-Tháng-Ngày (YYYY-MM-DD).'
            ]
        );
        $data = $request->only([
            'movie_name',
            'movie_name_vn',
            'release_date',
            'tagline_vn',
            'image_link'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('', $fileName, 'public'); //$request->file('image')->store('covers', 'public');
            $data['image'] = $path;
        }
        DB::table('movie')->insert($data);
        return redirect()->route('movielist')->with('status', 'Thêm phim thành công');
    }
    function movieDelete(Request $request)
    {
        DB::table('movie')->where("id", $request->input('id'))->delete();
        return redirect()->route('movielist')->with('status', "Xoá thành công");
    }
}
