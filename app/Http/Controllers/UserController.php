<?php

namespace App\Http\Controllers;
use Dotenv\Exception\ValidationException;
use App\Models\User;
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
   public function getEmployee(){
        $data = employee::all();
        return response()->json($data);
    }


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

//////....................user list.....................

public function getuserAlldata(){
    try {

            $query = "SELECT users.*, user_roles.*, roles.id AS role_id, roles.name AS role_name FROM users INNER JOIN user_roles ON users.id = user_roles.user_id INNER JOIN roles ON user_roles.role_id = roles.id WHERE users.id != 1 ORDER BY users.id DESC";

            $customerDetails = DB::select($query);

        return response()->json(['success' => 'Data loaded', 'data' => $customerDetails]);
    } catch (Exception $ex) {
        if ($ex instanceof ValidationException) {
            return response()->json([
                'ValidationException' => [
                    'id' => collect($ex->errors())->keys()[0],
                    'message' => $ex->errors()[collect($ex->errors())->keys()[0]]
                ]
            ]);
        }
    }


}

public function usersEdite($id){
try {
  /* $query = "SELECT users.*, user_roles.*
   FROM users
   INNER JOIN user_roles ON users.id = user_roles.user_id

   WHERE users.id = :id";*/

     $query = "SELECT users.*, user_roles.*, employees.*
   FROM users
   INNER JOIN user_roles ON users.id = user_roles.user_id
   LEFT JOIN employees ON users.user_id = employees.employee_id
   WHERE users.id = :id";

    $user = DB::select($query, ['id' => $id]);
    return response()->json(["user" => $user]);

/*$user = User::find($id);
    return response()->json(["user" => $user]);*/
} catch (Exception $ex) {
    return response()->json(["error" => $ex->getMessage()]);
}


}
public function updateUser(Request $request, $id)
{
    try {
        $user = User::findOrFail($id);

        $inputPassword = $request->get('txtPassword');
        if ($inputPassword) {
            if ($user) {
                $user->name = $request->input('txtname');
                $user->email = $request->input('txtEmail');
                $user->user_id = $request->input('cmbuEmployee');
                $user_type = $request->input('cmbuserTypeRole');
                $user->user_type = ($user_type == 0) ? 'Guest' : 'Employee';
                $user->save();



                $userRoleId = $request->input('cmbuserRole');
                $userRole = user_role::where('user_id', $user->id)->firstOrFail();

                if ($userRoleId !== 'null') {
                    $userRole->role_id = $userRoleId;
                    $userRole->save();


                }

                return response()->json(['status' => true]);
            } else {
                return response()->json(['error' => 'User not found']);
            }

        } else {
            return response()->json(['status' => false]);
        }


    } catch (Exception $ex) {
        return response()->json(['error' => $ex->getMessage()]);
    }
}


public function deleteusers($id){
    try {
       $user = User::find($id);
        $user->delete();

        $userRole = user_role::where('user_id', $id)->first();
        $userRole->delete();

        return response()->json(['success' => 'Record has been deleted']);
    } catch (Exception $ex) {
        return response()->json(['error' => $ex->getMessage()]);
    }
}



}
