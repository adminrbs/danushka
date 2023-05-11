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

        $data = customer_app_user::all();
        return response()->json( $data );

        /*$data = $users = DB::table('customer_app_users')
        ->join('customers', 'customer_app_users.customer_id', '=', 'customers.customer_id')
        ->select('customer_app_users.customer_app_user_id', 'customers.customer_name', 'customers.primary_address', 'customer_app_users.email', 'customer_app_users.mobile', 'customer_app_users.password')
        ->orderBy('customers.customer_id', 'DESC')
        ->distinct()
        ->get();

        return response()->json($data);*/

    }


    public function savecustomerUserApp(Request $request){

        $validatedData = $request->validate([
            'txtEmailcustomer' => 'required',
            'txtMobilphonecustomer' => 'required',
            'txtPasswordcustomer' => 'required',
        ]);
        try {

            $customerUserApp= new customer_app_user();
            $customerUserApp->email= $request->get('customerId');
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

}
