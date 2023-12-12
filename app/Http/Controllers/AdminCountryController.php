<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Yajra\DataTables\Facades\DataTables;

class AdminCountryController extends Controller
{
    public function Country(Request $request)
    {
        if ($request->ajax()) {
            $data = Country::where('delete_at','=',null)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn ripple btn-info editCountry"><ion-icon class="btnaction" name="create-outline"></ion-icon></a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn ripple btn-danger ms-2 deleteCountry"><ion-icon  name="trash-outline"></ion-icon></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->setRowClass('border-bottom')
                ->make(true);
        }
        return view('Admin.Frontend.Country.Country');
    }
    public function countryinsert(Request $request)
    {
        $Country = new Country();
        $Country->Name = $request->Name;
        $Country->save();
        return response()->json($Country);
    }
    public function countryEdite(Request $request)
    {
        $Country = Country::find($request->id);
        return response()->json($Country);
    }
    public function countryUpdate(Request $request)
    {
        $Country = Country::find($request->id);
        $Country->Name = $request->Name;
        $Country->update();
        return response()->json($Country);
    }
    public function countryDelete(Request $request)
    {
        $Country = Country::find($request->id);
        $Country->delete_at = time();
        $Country->update();
        return response()->json($Country);
    }
}