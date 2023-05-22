<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\employee_designation;
use Dotenv\Exception\ValidationException;
use Exception;
class EmployeeController extends Controller
{
    public function index(){
        return view('employee');
    }

    //...........save employee

public function reportEmployee(){
    $data = employee::orderBy('employee_id','ASC' )->get();
    return response()->json( $data );

}



    public function saveEmployee(Request $request){


        try {
            $employee = new employee();
            $employee->employee_name = $request->get('txtName');
            $employee->office_mobile = $request->get('txtOfficemobileno');
            $employee->office_email = $request->get('txtOfficeemail');
            $employee->persional_mobile = $request->get('txtPersionalmobile');
            $employee->persional_fixed = $request->get('txtPersionalfixedno');
            $employee->persional_email = $request->get('txtPersionalemail');
            $employee->address = $request->get('txtAddress');
            $employee->desgination_id = $request->get('cmbDesgination');
            $employee->report_to = $request->get('cmbReport');
            $employee->date_of_joined = $request->get('txtDateofjoined');
            $employee->date_of_resign = $request->get('txtDateofresign');
            $employee->status_id = $request->get('cmbStatus');
            $employee->note = $request->get('txtNote');



            if ($employee->save()) {

                return response()->json(["status" => true]);
            }
                return response()->json(["status" => false]);

        } catch (Exception $ex) {
        }
    }


    //................List employee..........

    public function getEmployeeDetails(){
        try {
            $customerDteails = employee::where('employee_id', '!=', 1)->get();
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

    public function getEmployeedata($id){

        try {
            //code...
            $employee = employee::find($id);
            return response()->json(["employee"=>$employee]);
        } catch (Exception $ex) {

        }return response()->json(["error"=>$ex]);


    }

    //..........Employee update.......

    public function employeeUpdate(Request $request,$id){

        $employee = employee::findOrFail($id)->update([

            'employee_name' => $request->txtName,
            'office_mobile'=>$request->txtOfficemobileno,
            'office_email'=>$request->txtOfficeemail,

            'persional_mobile' => $request->txtPersionalmobile,
            'persional_fixed'=>$request->txtPersionalfixedno,
            'persional_email'=>$request->txtPersionalemail,

            'address' => $request->txtAddress,
            'desgination_id'=>$request->cmbDesgination,
            'report_to'=>$request->cmbReport,

            'date_of_joined' => $request->txtDateofjoined,
            'date_of_resign'=>$request->txtDateofresign,
            'status_id'=>$request->cmbStatus,
            'note' => $request->txtNote,


        ]);
        return response()->json($employee);


    }

    //.........employee View......


    public function getEmployview($id){
     try {
        //code...
        $employee = employee::find($id);
        return response()->json(["employee"=>$employee]);
        } catch (Exception $ex) {

        }return response()->json(["error"=>$ex]);

    }

        //.......Employee Delete......


    public function employeeDelete($id){

        $employee = employee::findOrFail($id);
        $employee->delete();

        return response()->json([
             'message' => 'Student deleted successfully'
         ], 200);


        }

        public function empdesgnation(){
            $data = employee_designation::all();
            return response()->json($data);
        }

        public function empreport(){
            $data = employee::all();
            return response()->json($data);
        }
}
