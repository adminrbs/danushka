<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use App\Models\item_altenative_name;
use DB;
use Exception;
use Illuminate\Http\Request;


class International_nonproprietaryController extends Controller
{
     //all data

     public function nonproprietaryAllData(){

        $data = item_altenative_name::all();
        return response()->json( $data );
    }

    //........Save......
    public function nonproprietaryGroup(Request $request){

        $validatedData = $request->validate([
            'txtNonproprietary' => 'required',
        ]);

        try {

            $item_altenative= new item_altenative_name();
            $item_altenative->item_altenative_name = $request->get('txtNonproprietary');


            if ($item_altenative->save()) {

                return response()->json(['status' => true]);
            } else {
                Log::error('Error saving common setting: ' . print_r($item_altenative->getErrors(), true));
                return response()->json(['status' => false]);
            }
        } catch (Exception $ex) {
            return response()->json(['error' => $ex]);
        }
    }

    //edit

    public function nonproprietaryEdite(Request $request,$id){
        $item_altenative = item_altenative_name::find($id);
		return response()->json($item_altenative);
    }


    //........... update...
    public function nonproprietaryUpdate(Request $request,$id){
        $item_altenative = item_altenative_name::findOrFail($id)->update([
            'item_altenative_name' => $request->txtNonproprietary,
        ]);
        return response()->json($item_altenative);

    }


    //Delete

    public function deleteNonproprietary($id){

        $item_altenative = item_altenative_name::find($id);
        $item_altenative->delete();
    return response()->json(['success'=>'Record has been Delete']);

    }

    //Status Save

    public function nonproprietaryStatus(Request $request,$id){
        $item_altenative = item_altenative_name::findOrFail($id);
        $item_altenative->status_id = $request->status;
        $item_altenative->save();

        return response()->json(' status updated successfully');
    }

    // Search


    public function nonproprietarysearch(Request $request){

        $output="";
        $item_altenative = item_altenative_name::where('item_altenative_name_id','Like','%'.$request->search.'%')
                                ->orWhere('item_altenative_name','Like','%'.$request->search.'%')
                                ->get();


        foreach($item_altenative as $item_altenative){

            $status = "";
            if($item_altenative->status_id  == 1){
                $status = "checked";
            }

            $output.=

            '<tr>
            <td>'.$item_altenative->item_altenative_name_id  .' </td>
            <td>'.$item_altenative->item_altenative_name.' </td>

            <td> '.'<a href=""  type="button" class="btn btn-primary  nonproprietaryupdate" id="'.$item_altenative->item_altenative_name_id  .'" data-bs-toggle="modal" data-bs-target="#modalNonproprietary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'.'</td>
            <td> '.'<input type="button"  class="btn btn-danger" name="switch_single" id="" value="Delete" onclick="btnNonproprietaryDelete('.$item_altenative->item_altenative_name_id  . ')"> '.' </td>
            <td> '.'<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxNonproprietary" value="1" onclick="cbxNonproprietaryStatus('.$item_altenative->item_altenative_name_id  . ')" required '.$status.'></label>'.'</td>
            </tr>';
        }
        return response($output);

    }

}
