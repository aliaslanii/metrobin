<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class AdminActorController extends Controller
{
    public function actor(Request $request)
    {
        if ($request->ajax()) {
            $data = Actor::where('delete_at','=',null)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn ripple btn-info editActor"><ion-icon class="btnaction" name="create-outline"></ion-icon></a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn ripple btn-danger ms-2 deleteActor"><ion-icon  name="trash-outline"></ion-icon></a>';
                    return $btn;
                })
                ->addColumn('img', function($row){
                    $img = '<img style="height:5rem;width: auto !important;" class="img-sm product-image border" src="'.asset("images/Actorimages/".$row->img).'" />'; 
                    return $img;
                })
                ->rawColumns(['action','img'])
                ->setRowClass('border-bottom')
                ->make(true);
        }
        return view('Admin.Frontend.Actor.Actor');
    }
    public function actorinsert(Request $request)
    {
        $path = "images/Actorimages";
        $Actor = new Actor();
        $Actor->Name = $request->Name;
        $Actor->Description = $request->Description;
        $Actor->Birthday = $request->Birthday;
        $Actor->img = moveimg($request,$path);
        $Actor->save();
        return response()->json($Actor);
    }
    public function actorEdite(Request $request)
    {
        $Actor = Actor::find($request->id);
        return response()->json(['Actor' => $Actor , 'img' => getimgActor($Actor->img)]);
    }
    public function actorUpdate(Request $request)
    {
        $Actor = Actor::find($request->id);
        $Actor->Name = $request->Name;
        $Actor->Description = $request->Description;
        $Actor->Birthday = $request->Birthday;
        $Actor->img = updateActor($request,$Actor);
        $Actor->update();
        return response()->json($Actor);
    }
    public function actorDelete(Request $request)
    {
        $Actor = Actor::find($request->id);
        $Actor->delete_at = time();
        $Actor->update();
        return response()->json($Actor);
    }
}
