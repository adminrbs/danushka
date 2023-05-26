<?php

namespace App\Http\Controllers;
use App\Models\supplier_item_code;
use App\Models\supplier;
use App\Models\item;
use DB;
use Exception;

use Illuminate\Http\Request;

class supplierItemCodeController extends Controller
{
    public function suppliersname(){
        $data = supplier::all();
        return response()->json($data);
    }
    public function getitemdata(){

        try {

            $query = 'SELECT items.item_id, items.item_Name,items.Item_code,
            IF(supplier_item_codes.supplier_item_code IS NULL,"",supplier_item_codes.supplier_item_code) AS supplier_item_code FROM items LEFT JOIN supplier_item_codes ON items.item_id = supplier_item_codes.item_id';
            $customerDteails = DB::select($query);

            return response()->json((['success' => 'Data loaded', 'data' => $customerDteails]));


            /*
            $customerDteails = item::all();
            if ($customerDteails) {
                return response()->json((['success' => 'Data loaded', 'data' => $customerDteails]));
            } else {
                return response()->json((['error' => 'Data is not loaded']));
            }*/
        } catch (Exception $ex) {
            if ($ex instanceof ValidationException) {
                return response()->json(["ValidationException" => ["id" => collect($ex->errors())->keys()[0], "message" => $ex->errors()[collect($ex->errors())->keys()[0]]]]);
            }
        }

    }


    public function savesavesuppliers(Request $request){


        try {




            $status = false;
            $sup_item_code = supplier_item_code::where([['item_id','=',$request->get('item_id')]])->first();
            if($sup_item_code){
                $supplier=  supplier_item_code::find($sup_item_code['supplier_item_code_id']);
                if($supplier){
                    $supplier->item_id= $request->get('item_id');
                    $supplier->supplier_id= $request->get('cmbSupplieritemCode');
                    $supplier->supplier_item_code = $request->get('supplier_item_code');
                    $status = $supplier->update();
                }
            }else{
                $supplier= new supplier_item_code();
                $supplier->item_id= $request->get('item_id');
                $supplier->supplier_id= $request->get('cmbSupplieritemCode');
                $supplier->supplier_item_code = $request->get('supplier_item_code');
                $status = $supplier->save();
            }


           if ($status) {

                return response()->json(['status' => true]);
            } else {
                Log::error('Error saving common setting: ' . print_r($supplier->getErrors(), true));
                return response()->json(['status' => false]);
            }

        } catch (Exception $ex) {
            return response()->json(['status' => false,'error' => $ex]);
        }
    }
}
