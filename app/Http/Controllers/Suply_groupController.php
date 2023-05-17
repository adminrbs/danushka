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

        try {
            $customerDteails = supply_group::all();
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


    public function suplyGroupsearch(Request $request)
    {
        $output = "";
        $rowIndex = 0; // Initialize rowIndex to start from 0

        $supplygroup = supply_group::where('supply_group_id', 'LIKE', '%' . $request->search . '%')
            ->orWhere('supply_group', 'LIKE', '%' . $request->search . '%')
            ->get();

        foreach ($supplygroup as $supplygroup) {
            $status = $supplygroup->status_id == 1 ? 'checked' : '';
            $rowClass = $rowIndex % 2 === 0 ? 'even-row' : 'odd-row';

            $output .= '
                <tr class="' . $rowClass . '">
                    <td>' . $supplygroup->supply_group_id . '</td>
                    <td>' . $supplygroup->supply_group . '</td>
                    <td>
                        <a href="" type="button" class="btn btn-primary suplyGroup" id="' . $supplygroup->supply_group_id . '" data-bs-toggle="modal" data-bs-target="#modalSuplyGroup">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                        <input type="button" class="btn btn-danger" name="switch_single" id="" value="Delete" onclick="btnSuplyGroupDelete(' . $supplygroup->supply_group_id . ')">
                    </td>
                    <td>
                        <label class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="switch_single" id="cbxSuplyGroup" value="1" onclick="cbxSuplyGroupStatus(' . $supplygroup->supply_group_id . ')" required ' . $status . '>
                        </label>
                    </td>
                </tr>';

            $rowIndex++; // Increment rowIndex for each iteration
        }

        return response($output);
    }


    public function close(Request $request){
        return response()->json(['status' => 'success', 'message' => 'Request processed successfully']);
    }
}
