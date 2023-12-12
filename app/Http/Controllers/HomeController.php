<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class HomeController extends Controller
{
    public function index()
    {
        $Slid = Movie::where('delete_at','=',null)
        ->where('is_Slid','=',1)
        ->get();
        $Movies = Movie::where('delete_at','=',null)
        ->orderBy('Favorite','desc')
        ->take(9)
        ->get();
        $newMovies = Movie::where('delete_at','=',null)
        ->orderBy('created_at','desc')
        ->take(9)
        ->get();
        $HotMovies = Movie::where('delete_at','=',null)
        ->where('Hot','=',1)
        ->take(9)
        ->get();
        return view('Home.Frontend.index',[
            'Slid' => $Slid,
            'Movies' => $Movies,
            'newMovies' => $newMovies,
            'HotMovies' => $HotMovies
        ]);
    }
    public function about()
    {
        return view('Home.Frontend.about');
    }
}
