<?php

namespace App\Http\Controllers;
use App\Models\bank;
use App\Models\bank_branch;
use DB;
use Illuminate\Http\Request;

class BankController extends Controller
{

    public function searchBank(){
        $result = bank::all();
        return response()->json($result);

    }
    public function searchbranch(){
        $result = bank_branch::all();
        return response()->json($result);

    }



    public function getBankalldata()
{
    try {
        $data = bank::all();
        return response()->json(['success' => 'Data loaded', 'data' => $data]);
    } catch (Exception $ex) {
        if ($ex instanceof ValidationException) {
            return response()->json([

            ]);
        }
    }


}


    public function banksave(Request $request){

        try {


            $bank= new bank();
            $bank->bank_code= $request->get('txtBankCode');
            $bank->bank_name= $request->get('txtbankSearch');

           if ($bank->save()) {

                return response()->json(['status' => true]);
            } else {
                Log::error('Error saving common setting: ' . print_r($bank->getErrors(), true));
                return response()->json(['status' => false]);
            }

        } catch (Exception $ex) {
            return response()->json(['status' => false,'error' => $ex]);
        }
    }


public function getbannkEdit($id){
    $data = bank::find($id);
    return response()->json($data);
}

public function bankupdate(Request $request,$id){
    $bank = bank::findOrFail($id);
    $bank->bank_code = $request->input('txtBankCode');
    $bank->bank_name = $request->input('txtbankSearch');

        $bank->update();
        return response()->json($bank);
}



    public function bankStatus(Request $request,$id){
        $bank = bank::findOrFail($id);
        $bank->is_active = $request->status;
        $bank->save();

        return response()->json(' status updated successfully');
    }

    public function deletebank($id){
        $bank = bank::find($id);
            $bank->delete();
        return response()->json(['success'=>'Record has been Delete']);
    }

    //...................Branchers........................


    public function getBranchAlldata()
{
    try {
        $data = bank_branch::all();
        return response()->json(['success' => 'Data loaded', 'data' => $data]);
    } catch (Exception $ex) {
        if ($ex instanceof ValidationException) {
            return response()->json([

            ]);
        }
    }


}

public function savebranch(Request $request){

    try {


        $bank= new bank_branch();
        $bank->bank_branch_code= $request->get('txtbranchCode');
        $bank->bank_branch_name= $request->get('txtbranchSearch');

       if ($bank->save()) {

            return response()->json(['status' => true]);
        } else {
            Log::error('Error saving common setting: ' . print_r($bank->getErrors(), true));
            return response()->json(['status' => false]);
        }

    } catch (Exception $ex) {
        return response()->json(['status' => false,'error' => $ex]);
    }
}

public function getbranchkEdit($id){
$data = bank_branch::find($id);
return response()->json($data);
}
}
