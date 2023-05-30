<?php

namespace App\Http\Controllers;
use Dotenv\Exception\ValidationException;
use App\Models\user;
use App\Models\role;
use App\Models\employee;
use App\Models\user_role;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userrole(){
        $data = role::all();
        return response()->json($data);
    }
   /* public function getEmployee(){
        $data = employee::all();
        return response()->json($data);
    }*/


    public function saveuser(Request $request){

        try {
            $user = new User();
            $user->name = $request->get('txtname');
            $user->email = $request->get('txtEmail');


            $user->user_id = $request->get('cmbuEmployee');
            $user_type = $request->get('cmbuserTypeRole');
            if ($user_type == 0) {
                $user->user_type = 'Guest';
            } else {
                $user->user_type = 'Employee';
            }


           $user->password = Hash::make($request->get('txtPassword'));


            $passwordConfirmation = $request->get('txtConformPassword');
            if (Hash::check($passwordConfirmation, $user->password)) {

                $user->save();

                $userRole = new user_role();
        $userRole->user_id = $user->id;
        $userRole->role_id = $request->get('cmbuserRole');
        $userRole->save();

        return response()->json(['status' => true]);


            }



        } catch (Exception $ex) {
            return response()->json(['status' => false,'error' => $ex]);
        }
    }



}

