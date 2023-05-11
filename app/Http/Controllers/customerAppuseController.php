<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dotenv\Exception\ValidationException;
use App\Models\customer_app_user;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use DB;
use Exception;

class customerAppuseController extends Controller
{
    public function index(){
        $data = Customer::all();

        return view('customerAppuser',)->with('data',$data);
    }

    public function customeruserApp(){


        $data = $users = DB::table('customer_app_users')
        ->join('customers', 'customer_app_users.customer_id', '=', 'customers.customer_id')
        ->select('customer_app_users.customer_app_user_id', 'customers.customer_name', 'customers.primary_address', 'customer_app_users.email', 'customer_app_users.mobile', 'customer_app_users.password','customer_app_users.status_id')
        ->orderBy('customers.customer_id', 'DESC')
        ->distinct()
        ->get();

        return response()->json($data);

    }


    public function savecustomerUserApp(Request $request){

        $validatedData = $request->validate([
            'txtEmailcustomer' => 'required',
            'txtMobilphonecustomer' => 'required',
            'txtPasswordcustomer' => 'required',
        ]);
        try {

            $customerUserApp= new customer_app_user();
            $customerUserApp->customer_id= $request->get('cmbcustomerApp');
            $customerUserApp->email= $request->get('txtEmailcustomer');
            $customerUserApp->mobile = $request->get('txtMobilphonecustomer');
            $customerUserApp->password = password_hash($request->get('txtPasswordcustomer'), PASSWORD_DEFAULT);



            if ($customerUserApp->save()) {

                return response()->json(['status' => true]);
            } else {
                Log::error('Error saving common setting: ' . print_r($customerUserApp->getErrors(), true));
                return response()->json(['status' => false]);
            }
        } catch (Exception $ex) {
            return response()->json(['error' => $ex]);
        }
    }


public function customerEdit($id){
    $data = customer_app_user::find($id);
    return response()->json($data);
}

public function customerAppUpdate(Request $request,$id){
    $customer = customer_app_user::findOrFail($id);

    $customer->customer_id = $request->input('cmbcustomerApp');
    $customer->email = $request->input('txtEmailcustomer');
    $customer->mobile = $request->input('txtMobilphonecustomer');
    $customer->password = Hash::make($request->input('txtPasswordcustomer'));

    $customer->update();

    return response()->json($customer);

}


public function deletecustomerApp($id){
    $level3 = customer_app_user::find($id);
        $level3->delete();
    return response()->json(['success'=>'Record has been Delete']);
}



public function customerAppsearch(Request $request){

    $data = $users = DB::table('customer_app_users')
    ->join('customers', 'customer_app_users.customer_id', '=', 'customers.customer_id')
    ->select('customer_app_users.customer_app_user_id', 'customers.customer_name', 'customers.primary_address', 'customer_app_users.email', 'customer_app_users.mobile', 'customer_app_users.password','customer_app_users.status_id')
    ->orderBy('customers.customer_id', 'DESC')
    ->distinct()
    ->get();

        $output="";

        $customerApp = customer_app_user::where('customer_app_user_id','Like','%'.$request->search.'%')
                                ->orWhere('email','Like','%'.$request->search.'%')
                                ->orWhere('mobile','Like','%'.$request->search.'%')
                                ->get();


        foreach($customerApp as $customerApp){
            $category2 = $data->where('customer_app_user_id', $customerApp->customer_app_user_id)->first();

            $status = "";
            if($customerApp->status_id == 1){
                $status = "checked";
            }

            $output.= '<tr>
                <td>'.$customerApp->customer_app_user_id.' </td>
                <td>'.$category2->customer_name.' </td>
                <td>' .$customerApp->email.'</td>
                <td>' .$customerApp->mobile.'</td>
                <td>' .$customerApp->password.'</td>
                <td><a href=""  type="button" class="btn btn-primary  customerEdit" id="'.$customerApp->customer_app_user_id.'" data-bs-toggle="modal" data-bs-target="#modalCustomerApp"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </td>
                <td><input type="button"  class="btn btn-danger" name="switch_single" id="btncustomerApp" value="Delete" onclick="btnCustommerAppDelete(' .$customerApp->customer_app_user_id. ')"> </td>
                <td> <label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxCustomerApp" value="1" onclick="cbxCustomerappStatus(' .$customerApp->customer_app_user_id.  ')" required '.$status.'></label>  </td>
            </tr>';
        }
        return response($output);
    }

    public function customerAppStatus(Request $request,$id){
        $item_altenative = customer_app_user::findOrFail($id);
        $item_altenative->status_id = $request->status;
        $item_altenative->save();

        return response()->json(' status updated successfully');
    }

    public function customername(){
        $data = Customer::all();
        return response()->json($data);
    }

}
