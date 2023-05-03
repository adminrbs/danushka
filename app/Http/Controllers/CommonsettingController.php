<?php

namespace App\Http\Controllers;
use App\Models\District;
use App\Models\Town;
use App\Models\Customer_group;
use App\Models\Customer_grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommonsettingController extends Controller
{

    public function index(){
        $data = District::all();
        return view('common_setting')->with('data',$data);
    }

    public function districtData(){

        $data = District::orderBy('district_id','DESC' )->get();
            return response()->json( $data );
    }


    public function saveDistrict(Request $request) {
        try {

            $commonSetting = new District();
            $commonSetting->district_name = $request->get('txtDistrict');


            if ($commonSetting->save()) {

                return response()->json(['status' => true]);
            } else {
                Log::error('Error saving common setting: ' . print_r($commonSetting->getErrors(), true));
                return response()->json(['status' => false]);
            }
        } catch (Exception $ex) {
            return response()->json(['error' => $ex]);
        }
    }

    //......update distric......

    public function districtEdite($id){
        //$id = $request->id;
		$district = District::find($id);
		return response()->json($district);



    }

    public function districtUpdate(Request $request,$id){
        $district = District::findOrFail($id)->update([
        'district_name' => $request->txtDistrict,

    ]);
    return response()->json($district);
    }



    //...................
    public function checkDistrict($district_id ){
        $commonSetting = District::find($district_id );
    }

    //........search....

    public function searchDistrict(Request $request){

        $query = $request->get('query');

        $posts = Post::where('district_name', 'like', '%'.$query.'%')
                     ->orWhere('status_id', 'like', '%'.$query.'%')
                     ->get();

        return response()->json($posts);
    }

///#####################....Town......################################


public function twonAlldata(){
    $data = DB::table('towns')
            ->join('districts', 'towns.district_id', '=', 'districts.district_id')
            ->select('towns.town_id  as town_id', 'towns.town_name as town_name', 'districts.district_name as district_name')
            ->orderBy('districts.district_id', 'DESC')
            ->distinct()
            ->get();
    return response()->json($data);
}


    public function saveTown(Request $request) {
        try {

            $towndata = new Town();
            $towndata->town_name = $request->get('txtTown');
            $towndata->district_id = $request->get('cmbDistrict');


            if ($towndata->save()) {

                return response()->json(['status' => true]);
            } else {

                return response()->json(['status' => false]);
            }
        } catch (Exception $ex) {
            return response()->json(['error' => $ex]);
        }

    }



    public function townEdite($id){

		$town = Town::find($id);
		return response()->json($town);
    }

    public function townUpdate(Request $request,$id){
        $town = Town::findOrFail($id)->update([
        'district_id' => $request->cmbDistrict,
        'town_name' => $request->txtTown,

    ]);
    return response()->json($town);
    }



///#####################....Group......################################


public function groupAlldata(){
    $data = Customer_group::all();
    return response()->json( $data );

}


    public function saveGroup(Request $request) {
        try {

            $towndata = new Customer_group();
            $towndata->group = $request->get('txtGroup');



            if ($towndata->save()) {

                return response()->json(['status' => true]);
            } else {

                return response()->json(['status' => false]);
            }
        } catch (Exception $ex) {
            return response()->json(['error' => $ex]);
        }

    }


    public function groupEdite($id){

	dd($id);
    }

    public function groupUpdate(Request $request,$id){
        $town = Customer_group::findOrFail($id)->update([
        'group' => $request->txtGroup,


    ]);
    return response()->json($town);
    }


    //..............




///#####################....Grade......################################


public function gradeAlldata(){
    $data = Customer_grade::all();
    return response()->json( $data );

}


    public function savegrade(Request $request) {
        try {

            $towndata = new Customer_grade();
            $towndata->grade = $request->get('txtgrade');



            if ($towndata->save()) {

                return response()->json(['status' => true]);
            } else {

                return response()->json(['status' => false]);
            }
        } catch (Exception $ex) {
            return response()->json(['error' => $ex]);
        }

    }


    public function gradeEdite(Request $request){

        $id = $request->id;
		$grade = Customer_grade::find($id);
		return response()->json($grade);
    }

    public function gradeUpdate(Request $request,$id){
        $town = Customer_grade::findOrFail($id)->update([
        'grade' => $request->txtgrade,


    ]);
    return response()->json($town);
    }
}
