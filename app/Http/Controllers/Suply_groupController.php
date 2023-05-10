<?php

namespace App\Http\Controllers;
use Dotenv\Exception\ValidationException;
use App\Models\item_altenative_name;
use App\Models\supply_group;
use DB;
use Exception;
use Illuminate\Http\Request;

class Suply_groupController extends Controller
{

    //all data

    public function suplyGroupAllData(){

        $data = supply_group::all();
        return response()->json( $data );
    }

    //........Save......
    public function saveSuplyGroup(Request $request){

        $validatedData = $request->validate([
            'txtSupplygroup' => 'required',
        ]);

        try {

            $supplygroup= new supply_group();
            $supplygroup->supply_group = $request->get('txtSupplygroup');


            if ($supplygroup->save()) {

                return response()->json(['status' => true]);
            } else {
                Log::error('Error saving common setting: ' . print_r($supplygroup->getErrors(), true));
                return response()->json(['status' => false]);
            }
        } catch (Exception $ex) {
            return response()->json(['error' => $ex]);
        }
    }

    //edit

    public function suplyGroupEdite(Request $request,$id){
        $supplygroup = supply_group::find($id);
		return response()->json($supplygroup);
    }


    //........... update...
    public function supltGroupUpdate(Request $request,$id){
        $supplygroup = supply_group::findOrFail($id)->update([
            'supply_group' => $request->txtSupplygroup,
        ]);
        return response()->json($supplygroup);

    }


    //Delete

    public function deleteSuplygroup($id){

        $supplygroup = supply_group::find($id);
        $supplygroup->delete();
    return response()->json(['success'=>'Record has been Delete']);

    }

    //Status Save

    public function suplyGroupStatus(Request $request,$id){
        $supplygroup = supply_group::findOrFail($id);
        $supplygroup->status_id = $request->status;
        $supplygroup->save();

        return response()->json(' status updated successfully');
    }

    // Search


    public function suplyGroupsearch(Request $request){

        $output="";
        $supplygroup = supply_group::where('supply_group_id','Like','%'.$request->search.'%')
                                ->orWhere('supply_group','Like','%'.$request->search.'%')
                                ->get();


        foreach($supplygroup as $supplygroup){

            $status = "";
            if($supplygroup->status_id == 1){
                $status = "checked";
            }

            $output.=

            '<tr>
            <td>'.$supplygroup->supply_group_id  .' </td>
            <td>'.$supplygroup->supply_group.' </td>

            <td> '.'<a href=""  type="button" class="btn btn-primary  suplyGroup" id="'.$supplygroup->supply_group_id.  '" data-bs-toggle="modal" data-bs-target="#modalSuplyGroup"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> '.'</td>
            <td> '.'<input type="button"  class="btn btn-danger" name="switch_single" id="" value="Delete" onclick="btnSuplyGroupDelete(' .$supplygroup->supply_group_id. ')"> '.' </td>
            <td> '.'<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxSuplyGroup" value="1" onclick="cbxSuplyGroupStatus('  .$supplygroup->supply_group_id.  ')" required '.$status.'> '.'</td>
            </tr>';
        }
        return response($output);

    }

    public function close(Request $request){
        return response()->json(['status' => 'success', 'message' => 'Request processed successfully']);
    }
}
