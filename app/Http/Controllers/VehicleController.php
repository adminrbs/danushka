<?php

namespace App\Http\Controllers;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use App\Models\vehicle;
use App\Models\vehicle_type;
use DB;
use Exception;

class VehicleController extends Controller
{
    public function vehicaltypename(){
        $data = vehicle_type::all();
        return response()->json($data);
    }






    public function vehicaleAlldata()
{
    try {
            $query = "SELECT vehicles.*,vehicle_types.* FROM vehicles INNER JOIN vehicle_types ON vehicles.vehicle_type_id = vehicle_types.vehicle_type_id ORDER BY vehicles.vehicle_id DESC";
            $vehicle = DB::select($query);


        return response()->json(['success' => 'Data loaded', 'data' => $vehicle]);
    } catch (Exception $ex) {
        if ($ex instanceof ValidationException) {
            return response()->json([

            ]);
        }
    }


}


    public function savevehicle(Request $request){

        try {


            $vehicle= new vehicle();
            $vehicle->vehicle_no= $request->get('txtvehicleNo');
            $vehicle->vehicle_name= $request->get('txtVehicleName');
            $vehicle->description = $request->get('txtDescription');
            $vehicle->vehicle_type_id = $request->get('cmbVehicleType');
            $vehicle->licence_expire_date = $request->get('txtLicenceExpire');
            $vehicle->insurance_expire_date = $request->get('txtInsuranceExpire');
            $vehicle->remarks = $request->get('txtRemarks');




           if ($vehicle->save()) {

                return response()->json(['status' => true]);
            } else {
                Log::error('Error saving common setting: ' . print_r($vehicle->getErrors(), true));
                return response()->json(['status' => false]);
            }

        } catch (Exception $ex) {
            return response()->json(['status' => false,'error' => $ex]);
        }
    }


public function vehicaleEdit($id){
    $data = vehicle::find($id);
    return response()->json($data);
}

public function vehicaleUpdate(Request $request,$id){
    $vehicle = vehicle::findOrFail($id);
    $vehicle->vehicle_no = $request->input('txtvehicleNo');
    $vehicle->vehicle_name = $request->input('txtVehicleName');
    $vehicle->description = $request->input('txtDescription');
    $vehicle->vehicle_type_id = $request->input('cmbVehicleType');
    $vehicle->licence_expire_date = $request->input('txtLicenceExpire');
    $vehicle->insurance_expire_date = $request->input('txtInsuranceExpire');
    $vehicle->remarks = $request->input('txtRemarks');




        $vehicle->update();
        return response()->json($vehicle);
}



    public function vehicleStatus(Request $request,$id){
        $vehicle = vehicle::findOrFail($id);
        $vehicle->status_id = $request->status;
        $vehicle->save();

        return response()->json(' status updated successfully');
    }

    public function deleteVehicale($id){
        $vehicle = vehicle::find($id);
            $vehicle->delete();
        return response()->json(['success'=>'Record has been Delete']);
    }



}
