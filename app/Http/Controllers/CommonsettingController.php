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

        public function districtStatus(Request $request,$id){
            $district = District::findOrFail($id);
            $district->status_id = $request->status;
            $district->save();

            return response()->json('District status updated successfully');


        }



     //...........Search District.........

     public function dist_search(Request $request){
        $output="";
        $group = District::where('district_id','Like','%'.$request->search.'%')
                                ->orWhere('district_name','Like','%'.$request->search.'%')
                                ->get();


        foreach($group as $group){

            $isChecked="";
            if($district->status_id){
                $isChecked = 'checked';
            }

            $output.=

            '<tr>
            <td>'.$group->district_id .' </td>
            <td>'.$group->district_name.' </td>

            <td> '.' <a href=""  type="button" class="btn btn-primary  editDistrict" id="' . $group->district_id  . '" data-bs-toggle="modal" data-bs-target="#modelDistric"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> '.'</td>

            <td> '.' <label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxStatus" value="1" onclick="cbxStatus('. $group->district_id  . ')" required '.$isChecked.'></label>  '.'</td>
            </tr>';
        }
        return response($output);

    }

    public function save_town_status(Request $request)
    {


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


     //...........Search Grade.........

     public function town_search(Request $request){
        $output="";
        $data = DB::table('towns')
        ->join('districts', 'towns.district_id', '=', 'districts.district_id')
        ->select('towns.town_id  as town_id', 'towns.town_name as town_name', 'districts.district_name as district_name')
        ->orderBy('districts.district_id', 'DESC')
        ->distinct()
        ->get();
        $group = Town::where('town_id','Like','%'.$request->search.'%')
                                ->orWhere('district_id','Like','%'.$request->search.'%')
                                ->orWhere('town_name','Like','%'.$request->search.'%')
                                ->get();


        foreach($group as $group){
            $district = $data->where('town_id', $group->town_id)->first();
            $output.=
            '<tr>
            <td>'.$group->town_id .' </td>
            <td>'.$group->town_name.' </td>
            <td>'.$district->district_name.' </td>
            <td> '.' <a href="#"  type="button" class="btn btn-primary  editTwon" id="'. $group->town_id  . '" data-bs-toggle="modal" data-bs-target="#modelTown"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  '.'</td>

            <td> '.' <label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxTownStatus" value="1" onclick="cbxTownStatus('. $group->town_id  . ')" required></label>  '.'</td>
            </tr>';
        }
        return response($output);

    }


    /////////.....Status........




    public function townUpdateStatus(Request $request,$id){
        $town = Town::findOrFail($id);
        $town->status_id = $request->status;
        $town->save();

        return response()->json('District status updated successfully');


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

		$group = Customer_group::find($id);
		return response()->json($group);
    }

    public function groupUpdate(Request $request,$id){
        $group = Customer_group::findOrFail($id)->update([
        'group' => $request->txtGroup,
    ]);
    return response()->json($group);
    }


    //...........Search Grade.........

    public function group_search(Request $request){
        $output="";
        $group = Customer_group::where('customer_group_id','Like','%'.$request->search.'%')
                                ->orWhere('group','Like','%'.$request->search.'%')
                                ->get();


        foreach($group as $group){
            $output.=
            '<tr>
            <td>'.$group->customer_group_id.' </td>
            <td>'.$group->group.' </td>
            <td> '.' <a href="#"  type="button" class="btn btn-primary  editGroup" id="' . $group->customer_group_id .'" data-bs-toggle="modal" data-bs-target="#modalGroup"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'.'</td>

            <td> '.' <label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single"  id="cbxGroupStatus" value="1" onclick="cbxGroupStatus('. $group->customer_group_id . ')" required></label>  '.'</td>
            </tr>';
        }
        return response($output);

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
        $group->status_id = $request->status;
        $group->save();

        return response()->json('District status updated successfully');


    }





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


        foreach($grade as $grade){
            $output.=
            '<tr>
            <td>'.$grade->customer_grade_id.' </td>
            <td>'.$grade->grade.' </td>
            <td> '.' <a href="#"  type="button" class="btn btn-primary  editGrade" id="' . $grade->customer_grade_id .'" data-bs-toggle="modal" data-bs-target="#modalGrade"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'.'</td>

            <td> '.' <label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxGradeStatus" value="1" onclick="cbxGradeStatus('. $grade->customer_grade_id . ')" required></label>  '.'</td>
            </tr>';
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
    $grade->status_id = $request->status;
    $grade->save();

    return response()->json('District status updated successfully');


}




}
