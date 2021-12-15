<?php

namespace App\Http\Controllers;

use App\Models\Purpose;
use Illuminate\Http\Request;
use App\Models\VisaType;
use App\Models\Country;
use App\Models\SubPurpose;
use App\Models\Cities;
use App\Models\Districts;
use App\Models\SubDistricts;
use App\Models\Provinces;



class TrainingController extends Controller
{
    public function index()
    {
        $visa_type = VisaType::all();
        $purpose = Purpose::all();
        $country = Country::all();
        $provinces = Provinces::all();

        return view('training',compact('visa_type','purpose','country','provinces'));
    }

    public function findPurpose(Request $request)
    {
        $data = Purpose::select('visa_code','purpose')->where('visa_type',$request->id)->take(100)->get();
        return response()->json($data);
    }
    public function findSubPurpose(Request $request)
    {
        $data = SubPurpose::select('visa_code','sub_purpose')->where('visa_code',$request->id)->get();
        return response()->json($data);
    }
    public function findCity(Request $request)
    {
        $data = Cities::select('city_id','city_name')->where('prov_id',$request->id)->get();
        return response()->json($data);
    }
    public function findDistrict(Request $request)
    {
        $data = Districts::select('dis_id','dis_name')->where('city_id',$request->id)->get();
        return response()->json($data);
    }

    public function submit(Request $request)
    {
        dd($request->all());
    }
}
