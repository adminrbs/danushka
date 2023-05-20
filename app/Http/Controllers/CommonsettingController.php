<?php

namespace App\Http\Controllers;
use App\Models\category_level_1;
use App\Models\category_level_2;
use App\Models\District;
use App\Models\Town;
use App\Models\Customer_group;
use App\Models\Customer_grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommonsettingController extends Controller
{

    public function index(){

        $townDistrict = District::orderBy('district_id','asc')->get();
        $level1= category_level_1::all();
        $level2 = category_level_2::all();


        return view('common_setting',)->with('townDistrict',$townDistrict)->with('level2',$level2)->with('level1',$level1);
    }

    public function districtData(){

        try {
            $customerDteails = District::all();
            if ($customerDteails) {
                return response()->json((['success' => 'Data loaded', 'data' => $customerDteails]));
            } else {
                return response()->json((['error' => 'Data is not loaded']));
            }
        } catch (Exception $ex) {
            if ($ex instanceof ValidationException) {
                return response()->json(["ValidationException" => ["id" => collect($ex->errors())->keys()[0], "message" => $ex->errors()[collect($ex->errors())->keys()[0]]]]);
            }
        }
    }


    public function saveDistrict(Request $request) {

        $validatedData = $request->validate([
            'txtDistrict' => 'required',

        ]);
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

        public function districtStatus(Request $request,$id){
            $district = District::findOrFail($id);
            $district->is_active = $request->status;
            $district->save();

            return response()->json(' status updated successfully');


        }



    public function save_town_status(Request $request)
    {


    }
    public function deleteDistrict($id){
        $district = District::find($id);
        if($district->district_id==1){
            return response()->json(['error' => 'Record has been Not Delete']);
        }else {
            $district->delete();
            return response()->json(['success'=>'Record has been Delete']);
        }

    }
///#####################....Town......################################

public function loadDistrict(){
    $data = District::orderBy('district_id','ASC' )->get();
return response()->json( $data );
}

public function towndistrict(){
    $data = District::orderBy('district_id','ASC' )->get();
    return response()->json( $data );

}



public function twonAlldata(){


    try {
        /*$customerDetails = DB::table('towns')
        ->join('districts', 'towns.district_id', '=', 'districts.district_id')
        ->select('towns.town_id  as town_id', 'towns.town_name as town_name', 'districts.district_name as district_name','towns.is_active')
        ->orderBy('districts.district_id', 'DESC')
        ->distinct()
        ->get();*/
        $query = "SELECT towns.*,districts.district_name FROM
        towns INNER JOIN districts ON towns.district_id = districts.district_id WHERE TOWNS.town_id != '1'";
        $customerDetails = DB::select($query);

        if (count($customerDetails) > 0) {
            return response()->json(['success' => 'Data loaded', 'data' => $customerDetails]);
        } else {
            return response()->json(['error' => 'Data is not loaded']);
        }
    } catch (Exception $ex) {
        if ($ex instanceof ValidationException) {
            return response()->json([
                'ValidationException' => [
                    'id' => collect($ex->errors())->keys()[0],
                    'message' => $ex->errors()[collect($ex->errors())->keys()[0]]
                ]
            ]);
        }
    }

    return response()->json($customerDetails);

}


    public function saveTown(Request $request) {

        $validatedData = $request->validate([
            'txtTown' => 'required',
            'cmbDistrict' => 'required',

        ]);
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



    /////////.....Status........




    public function townUpdateStatus(Request $request,$id){
        $town = Town::findOrFail($id);
        $town->is_active = $request->status;
        $town->save();

        return response()->json(' status updated successfully');


    }

    public function deleteTown($id){
        $district = Town::find($id);
        if($district->town_id == 1){
            return response()->json(['error' => 'Record has been Not Delete']);
        }else{

            $district->delete();
        return response()->json(['success'=>'Record has been Delete']);
        }
    }



///#####################....Group......################################


public function groupAlldata(){
    try {
        $customerDteails = Customer_group::all();
        if ($customerDteails) {
            return response()->json((['success' => 'Data loaded', 'data' => $customerDteails]));
        } else {
            return response()->json((['error' => 'Data is not loaded']));
        }
    } catch (Exception $ex) {
        if ($ex instanceof ValidationException) {
            return response()->json(["ValidationException" => ["id" => collect($ex->errors())->keys()[0], "message" => $ex->errors()[collect($ex->errors())->keys()[0]]]]);
        }
    }

}


    public function saveGroup(Request $request) {
        $validatedData = $request->validate([
            'txtGroup' => 'required',


        ]);
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

		$group = Customer_group::find($id);
		return response()->json($group);
    }

    public function groupUpdate(Request $request,$id){
        $group = Customer_group::findOrFail($id)->update([
        'group' => $request->txtGroup,
    ]);
    return response()->json($group);
    }


 /////////.....Status........

    public function updateStatusGroup($customer_group_id)
        {

            $group = Customer_group::find($customer_group_id);
            if (!$group) {
                return response()->json(['status' => 'error', 'message' => 'District not found']);
            }

            $status = ($group->status == 1) ? true : false;
            return response()->json(['status' => $status]);
          }


    public function groupUpdateStatus(Request $request,$id){
        $group = Customer_group::findOrFail($id);
        $group->is_active = $request->status;
        $group->save();

        return response()->json('District status updated successfully');


    }

    public function deleteGroup($id){
        $district = Customer_group::find($id);
            $district->delete();
        return response()->json(['success'=>'Record has been Delete']);
    }



///#####################....Grade......################################


public function gradeAlldata(){

    try {
        $customerDteails = Customer_grade::all();
        if ($customerDteails) {
            return response()->json((['success' => 'Data loaded', 'data' => $customerDteails]));
        } else {
            return response()->json((['error' => 'Data is not loaded']));
        }
    } catch (Exception $ex) {
        if ($ex instanceof ValidationException) {
            return response()->json(["ValidationException" => ["id" => collect($ex->errors())->keys()[0], "message" => $ex->errors()[collect($ex->errors())->keys()[0]]]]);
        }
    }

}


    public function savegrade(Request $request) {
        $validatedData = $request->validate([
            'txtgrade' => 'required',


        ]);
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



    public function gradeEdite($id){
		$grade = Customer_grade::find($id);
		return response()->json($grade);
    }


    public function gradeUpdate(Request $request,$id){
        $group = Customer_grade::findOrFail($id)->update([
        'grade' => $request->txtgrade,
    ]);
    return response()->json($group);
    }

    //...........Search Grade.........

    public function grade_search(Request $request){
        $output="";
        $grade = Customer_grade::where('customer_grade_id','Like','%'.$request->search.'%')
                                ->orWhere('grade','Like','%'.$request->search.'%')
                                ->get();


                                foreach ($grade as $index => $grade) {
                                    $status = $grade->is_active == 1 ? 'checked' : '';

                                    // Determine the CSS class for the row based on the index
                                    $rowClass = $index % 2 === 0 ? 'even-row' : 'odd-row';

                                    $output .= '<tr class="' . $rowClass . '">';
                                    $output .= '<td>' . $grade->customer_grade_id . '</td>';
                                    $output .= '<td>' . $grade->grade . '</td>';
                                    $output .= '<td><a href="#" type="button" class="btn btn-primary editGrade" id="' . $grade->customer_grade_id . '" data-bs-toggle="modal" data-bs-target="#modalGrade"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>';
                                    $output .= '<td><input type="button" class="btn btn-danger" name="switch_single" id="btnGrade" value="Delete" onclick="btnGradeDelete(' . $grade->customer_grade_id . ')"></td>';
                                    $output .= '<td><label class="form-check form-switch"><input type="checkbox" class="form-check-input" name="switch_single" id="cbxGradeStatus" value="1" onclick="cbxGradeStatus(' . $grade->customer_grade_id . ')" required ' . $status . '></label></td>';
                                    $output .= '</tr>';
                                }
        return response($output);

    }


    public function updateStatusGrade($customer_grade_id)
    {

        $grade = Customer_grade::find($customer_grade_id);
        if (!$grade) {
            return response()->json(['status' => 'error', 'message' => 'District not found']);
        }

        $status = ($grade->status == 1) ? true : false;
        return response()->json(['status' => $status]);
      }


public function gradeUpdateStatus(Request $request,$id){
    $grade = Customer_grade::findOrFail($id);
    $grade->is_active = $request->status;
    $grade->save();

    return response()->json(' status updated successfully');


}
public function deleteGrade($id){
    $district = Customer_grade::find($id);
        $district->delete();
    return response()->json(['success'=>'Record has been Delete']);
}



}
