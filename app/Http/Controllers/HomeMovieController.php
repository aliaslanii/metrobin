<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class HomeMovieController extends Controller
{
    public function showMovie($id)
    {
        $Movie = Movie::find($id);
        $Movie->Favorite = $Movie->Favorite + 1;
        $Movie->update();
        foreach($Movie->genres as $genres)
        {
            $genre = $genres;
            break;
        }
        $SuggestionMovie = $genre->Movie;
        return view('Home.Frontend.Movie.Showmovie',[
            'Movie' => $Movie,
            'SuggestionMovie' => $SuggestionMovie
        ]);
    }
    public function favoriteMovie()
    {
        $Movies = Movie::where('delete_at','=',null)
        ->orderBy('Favorite','desc')
        ->paginate(16);
        return view('Home.Frontend.Movie.Movies',[
            'Movies' => $Movies,
            'PageName' => 'محبوب ترین فیلم ها'
        ]);
    }
    public function newMovies()
    {
        $Movies = Movie::where('delete_at','=',null)
        ->orderBy('created_at','desc')
        ->orderBy('Favorite','desc')
        ->paginate(16);
        return view('Home.Frontend.Movie.Movies',[
            'Movies' => $Movies,
            'PageName' => 'جدیدتر ترین فیلم ها'
        ]);
    }
    public function hotMovies()
    {
        $Movies = Movie::where('delete_at','=',null)
        ->where('Hot','=',1)
        ->orderBy('Favorite','desc')
        ->paginate(16);
        return view('Home.Frontend.Movie.Movies',[
            'Movies' => $Movies,
            'PageName' => 'داغ ترین فیلم ها'
        ]);
    }
    public function genreMovie($id)
    {
        $Genre = Genre::findOrFail($id);
        $Movies = $Genre->Movie;
        return view('Home.Frontend.Movie.FindGenur',[
            'Movies' => $Movies
        ]);
    }
    
    public function findMovie($Type,$id)
    {
        if($Type == 'Actor')
        {
            $Humen = Actor::findOrFail($id);
            $Movies = $Humen->Movie->take(9);
            $img = asset('images/Actorimages/'.$Humen->img);

        }elseif($Type == 'Director'){

            $Humen = Director::findOrFail($id);
            $Movies = Movie::where('delete_at','=',null)
            ->where('directors_id','=',$Humen->id)
            ->take(9)
            ->get();
            $img = asset('images/Directorimages/'.$Humen->img);
        }
        return view('Home.Frontend.Movie.FindMovie',[
            'Humen' => $Humen,
            'Movies' => $Movies,
            'img' => $img
        ]);
    }
    public function searchMovie(Request $request)
    {
        $Movies = Movie::where('delete_at','=',null)
        ->where('Name','like','%'.$request->q.'%')
        ->orderBy('Favorite','desc')
        ->paginate(16);
        return view('Home.Frontend.Movie.SearchMovie',[
            'q' => $request->q,
            'Movies' => $Movies
        ]);
    }
}