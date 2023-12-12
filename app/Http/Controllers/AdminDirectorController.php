<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminDirectorController extends Controller
{
    public function director(Request $request)
    {
        if ($request->ajax()) {
            $data = Director::where('delete_at','=',null)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn ripple btn-info editDirector"><ion-icon class="btnaction" name="create-outline"></ion-icon></a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn ripple btn-danger ms-2 deleteDirector"><ion-icon  name="trash-outline"></ion-icon></a>';
                    return $btn;
                })
                ->addColumn('img', function($row){
                    $img = '<img style="height:5rem;width: auto !important;" class="img-sm product-image border" src="'.asset("images/Directorimages/".$row->img).'" />'; 
                    return $img;
                })
                ->rawColumns(['action','img'])
                ->setRowClass('border-bottom')
                ->make(true);
        }
        return view('Admin.Frontend.Director.Director');
    }
    public function directorinsert(Request $request)
    {
        $path = "images/Directorimages";
        $Director = new Director();
        $Director->Name = $request->Name;
        $Director->Description = $request->Description;
        $Director->Birthday = $request->Birthday;
        $Director->img = moveimg($request,$path);
        $Director->save();
        return response()->json($Director);
    }
    public function directorEdite(Request $request)
    {
        $Director = Director::find($request->id);
        return response()->json(['Director' => $Director , 'img' => getimgDirector($Director->img)]);
    }
    public function directorUpdate(Request $request)
    {
        $Director = Director::find($request->id);
        $Director->Name = $request->Name;
        $Director->Description = $request->Description;
        $Director->Birthday = $request->Birthday;
        $Director->img = updateDirector($request,$Director);
        $Director->update();
        return response()->json($Director);
    }
    public function directorDelete(Request $request)
    {
        $Director = Director::find($request->id);
        $Director->delete_at = time();
        $Director->update();
        return response()->json($Director);
    }
}