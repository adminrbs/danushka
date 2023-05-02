<?php

namespace App\Http\Controllers;
use App\Models\District;
use App\Models\Town;
use App\Models\Customer_group;
use App\Models\Customer_grade;
use Illuminate\Http\Request;

class CommonsettingController extends Controller
{

    public function index(){
        return view('common_setting');
    }

    public function allData(){

        $data = District::orderBy('district_id','DESC' )->get();
            return response()->json( $data );
    }


    public function saveCommonsetting(Request $request) {
        try {
            $townName = $request->get('txtTown');
            $groupName = $request->get('txtGroup');
            $gradeName = $request->get('txtGrade');
            $commonSetting = new District();
            $commonSetting->district_name = $request->get('txtDistrict');
            $this->group($groupName);
            $this->grade($gradeName);

            if ($commonSetting->save()) {
                $this->town($commonSetting->id,$townName);
                return response()->json(['status' => true]);
            } else {
                Log::error('Error saving common setting: ' . print_r($commonSetting->getErrors(), true));
                return response()->json(['status' => false]);
            }
        } catch (Exception $ex) {

        }
    }

    public function town($id, $townName) {

        if($townName){
            $town = new Town();
            $town->district_id = $id;
            $town->town_name = $townName;
            $town->save();
        }
    }


    public function group($groupName){

        $group = new Customer_group();
        $group->group = $groupName;
        $group->save();

    }
    public function grade($gradeName){

        $grade = new Customer_grade();
        $grade->grade = $gradeName;
        $grade->save();

    }

    //..............
}
