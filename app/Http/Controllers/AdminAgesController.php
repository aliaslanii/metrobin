<?php

namespace App\Http\Controllers;

use App\Models\Ages;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminAgesController extends Controller
{
    public function ages(Request $request)
    {
        if ($request->ajax()) {
            $data = Ages::where('delete_at','=',null)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn ripple btn-info editAges"><ion-icon class="btnaction" name="create-outline"></ion-icon></a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn ripple btn-danger ms-2 deleteAges"><ion-icon  name="trash-outline"></ion-icon></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->setRowClass('border-bottom')
                ->make(true);
        }
        return view('Admin.Frontend.Ages.Ages');
    }
    public function agesinsert(Request $request)
    {
        $Ages = new Ages();
        $Ages->Ages = $request->Ages;
        $Ages->save();
        return response()->json($Ages);
    }
    public function agesEdite(Request $request)
    {
        $Ages = Ages::find($request->id);
        return response()->json($Ages);
    }
    public function agesUpdate(Request $request)
    {
        $Ages = Ages::find($request->id);
        $Ages->Ages = $request->Ages;
        $Ages->update();
        return response()->json($Ages);
    }
    public function agesDelete(Request $request)
    {
        $Ages = Ages::find($request->id);
        $Ages->delete_at = time();
        $Ages->update();
        return response()->json($Ages);
    }
}