<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Ages;
use App\Models\Country;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Lang;
use App\Models\Movie;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class AdminMovieController extends Controller
{
    public function movie(Request $request)
    {
        if ($request->ajax()) {
            $data = Movie::where('delete_at', '=', null)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn ripple btn-info editMovie"><ion-icon class="btnaction" name="create-outline"></ion-icon></a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn ripple btn-danger ms-2 deleteMovie"><ion-icon  name="trash-outline"></ion-icon></a>';
                    return $btn;
                })
                ->addColumn('Genre', function($row){
                    $data = '<ul>';                                   
                    foreach($row->genres as $genre)
                    {
                        $data = $data . '<li>'.$genre->Name.'</li>';
                    }
                    return $data .'</ul>';
                })
                ->addColumn('img', function($row){
                    $img = '<img style="height:5rem;width: auto !important;" class="img-sm product-image border" src="'.asset("images/Cover-Movie/".$row->img).'" />'; 
                    return $img;
                })
                ->rawColumns(['action','img','Genre'])
                ->setRowClass('border-bottom')
                ->make(true);
        }
        return view('Admin.Frontend.Movie.Movies');
    }
    public function movieCreate()
    {
        $Genres = Genre::where('delete_at','=',null)
        ->get();
        $Langs = Lang::where('delete_at','=',null)
        ->get();
        $Countries = Country::where('delete_at','=',null)
        ->get();
        $Ages = Ages::where('delete_at','=',null)
        ->get();
        $Actors = Actor::where('delete_at','=',null)
        ->get();
        $Directors = Director::where('delete_at','=',null)
        ->get();
        return view('Admin.Frontend.Movie.MovieCreate',[
            'Ages' => $Ages,
            'Genres' => $Genres,
            'Langs' => $Langs,
            'Countries' => $Countries,
            'Actors' => $Actors,
            'Directors' => $Directors
        ]);
    }
    public function movieinsert(Request $request)
    {
        $path = "images/Cover-Movie";
        $TempFiles = TempFile::where('Folder','=',$request->Movie)->first();
        $Movie = new Movie();
        $Movie->Name = $request->Name;
        $Movie->Time = $request->Time;
        $Movie->YearS = $request->YearS;
        $Movie->ages_id = $request->Ages;
        $Movie->directors_id = $request->Director;
        $Movie->info = $request->info;
        $Movie->Imdb = $request->imdb;
        $Movie->Hot = $request->Hot ?? 0;
        $Movie->Movie = moveMovie($TempFiles);
        $Movie->img = moveimg($request,$path);
        $Movie->save();
        $Movie->Genres()->attach($request->Genres);
        $Movie->Country()->attach($request->Countries);
        $Movie->Langs()->attach($request->Langs);
        $Movie->Actor()->attach($request->Actors);
        return redirect(route('Movie'));
    }
    
    public function tempuploadMovie(Request $request)
    {
        if($request->hasFile('Movie'))
        {
            $Movie = $request->Movie;
            $extension = $Movie->extension();
            $fileName = verta()->format('Ymd-hms')."-".random_int(100000, 999999).".".$extension;
            $folder = uniqid('Movies-',true);
            $Movie->storeAs('Movies/temp/' . $folder,$fileName);
            $tempfile = new TempFile();
            $tempfile->File = $fileName;
            $tempfile->Folder = $folder;
            $tempfile->save();
            return $folder;
        }
        return '';
    }
    public function tempdeleteMovie()
    {
        $TempFile = TempFile::where('Folder',request()->getContent())->first();
        Storage::deleteDirectory('Movies/temp/'.$TempFile->Folder);
        $TempFile->delete();
        return response()->noContent();
    }
}