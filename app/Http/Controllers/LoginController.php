<?php

namespace App\Http\Controllers;
use Dotenv\Exception\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{



    public function loginForm(Request $request){



        $email = $request->txtEmail;
        $password = $request->txtPassword;

        if (Auth::attempt(['email' => $email, 'password' => $password], true)) {
            // Authentication passed...

            $login_status = ["status" => "200", "redirect" => ""];


            return $login_status;
        } else {
            return "201";
        }



        /*if (!$request->has('txtEmail')) {
            return response()->json(['message' => 'Email not provided.'], 400);
        }

        $txtEmail = $request->input('txtEmail');
        $txtpassword = $request->input('txtPassword');



        // Check if the user with the given email exists in the database
        $user = User::where('email', $txtEmail)->first();
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }


        if (!Hash::check($txtpassword, $user->password)) {
            return response()->json(['message' =>'Invalide Password'], 401);
        }

        // If the email and password match, return a success message
        return response()->json(['message' => 'Login successful.']);*/
    }





    // ...

   //public function logout()
   //{
   //    Auth::logout();

   //    return redirect('/submitForm');
   //}
}



