<?php

namespace App\Http\Controllers;
use Dotenv\Exception\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Exception;

use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    //changePassword

    public function changePassword(Request $request){

        $user = Auth::user();
        $Name = $request->input('txtusername');

        if ($user->name == $Name) {
            $current_password = $request->get('txtcurrentPassword');
            $new_password = $request->get('txtConformPassword');
            if (Hash::check($current_password, $user->password)) {
                $user->password = Hash::make($new_password);
                $user->save();
                return response()->json(['status' => true]);
            }

            // Update the user's password
          /* */
        }


    }
}
