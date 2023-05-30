<?php

namespace App\Http\Controllers;
use App\Models\role;
use DB;
use Exception;
use Illuminate\Http\Request;

class roleController extends Controller
{
    public function getuserrole(){

        try {
            $customerDteails = role::all();
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
    public function saveuserrole(Request $request){


        try {

            $userrole= new role();
            $userrole->name = $request->get('txtUserRole');


            if ($userrole->save()) {

                return response()->json(['status' => true]);
            } else {
                Log::error('Error saving common setting: ' . print_r($userrole->getErrors(), true));
                return response()->json(['status' => false]);
            }
        } catch (Exception $ex) {
            return response()->json(['error' => $ex]);
        }
    }

    //edit

    public function useroleEdite(Request $request,$id){
        $userrole = role::find($id);
		return response()->json($userrole);
    }


    //........... update...
    public function userroleUpdate(Request $request,$id){
        $userrole = role::findOrFail($id)->update([
            'name' => $request->txtUserRole,
        ]);
        return response()->json($userrole);

    }


    //Delete

    public function deleteUserole($id){

        $userrole = role::find($id);
        $userrole->delete();
    return response()->json(['success'=>'Record has been Delete']);

    }

    //Status Save

    public function userRoleStatus(Request $request,$id){
        $userrole = role::findOrFail($id);
        $userrole->status = $request->status;
        $userrole->save();

        return response()->json(' status updated successfully');
    }


}
