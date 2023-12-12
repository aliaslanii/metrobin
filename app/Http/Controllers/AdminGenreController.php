<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminGenreController extends Controller
{
    public function genre(Request $request)
    { 
        if ($request->ajax()) {
            $data = Genre::where('delete_at','=',null)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn ripple btn-info editGenre"><ion-icon class="btnaction" name="create-outline"></ion-icon></a>';
                    $btn = $btn.'<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn ripple btn-danger ms-2 deleteGenre"><ion-icon  name="trash-outline"></ion-icon></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->setRowClass('border-bottom')
                ->make(true);
            }
        return view('Admin.Frontend.Genre.Genre');
    }

    public function genreinsert(Request $request)
    {
        $Genre = new Genre();
        $Genre->Name = $request->Name;
        $Genre->Description = $request->Description;
        $Genre->save();
        return response()->json($Genre);
    }

    public function genreEdite(Request $request)
    {
        $Genre = Genre::find($request->id);
        return response()->json($Genre);
    }
    public function genreUpdate(Request $request)
    {
        $Genre = Genre::find($request->id);
        $Genre->Name = $request->Name;
        $Genre->Description = $request->Description;
        $Genre->update();
        return response()->json($Genre);
    }
    public function genreDelete(Request $request)
    {
        $Genre = Genre::find($request->id);
        $Genre->delete_at = time();
        $Genre->update();
        return response()->json($Genre);
    }
}
