<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminLangController extends Controller
{
    public function lang(Request $request)
    {
        if ($request->ajax()) {
            $data = Lang::where('delete_at','=',null)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn ripple btn-info editLang"><ion-icon class="btnaction" name="create-outline"></ion-icon></a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn ripple btn-danger ms-2 deleteLang"><ion-icon  name="trash-outline"></ion-icon></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->setRowClass('border-bottom')
                ->make(true);
        }
        return view('Admin.Frontend.lang.lang');
    }
    public function langinsert(Request $request)
    {
        $lang = new Lang();
        $lang->Name = $request->Name;
        $lang->save();
        return response()->json($lang);
    }
    public function langEdite(Request $request)
    {
        $lang = Lang::find($request->id);
        return response()->json($lang);
    }
    public function langUpdate(Request $request)
    {
        $lang = lang::find($request->id);
        $lang->Name = $request->Name;
        $lang->update();
        return response()->json($lang);
    }
    public function langDelete(Request $request)
    {
        $lang = Lang::find($request->id);
        $lang->delete_at = time();
        $lang->update();
        return response()->json($lang);
    }
}
