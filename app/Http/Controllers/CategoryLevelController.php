<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\category_level_1;
use App\Models\category_level_2;
use App\Models\category_level_3;
use App\Models\employee_designation;
use App\Models\employee_Status;
use Dotenv\Exception\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryLevelController extends Controller
{
    //......loard data ...
    public function categoryLevel1Data(){

        try {
            $customerDteails = category_level_1::all();
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

    //...........save data.....
    public function saveCategoryLevel1(Request $request){

        $validatedData = $request->validate([
            'txtCategorylevel1' => 'required',
        ]);

        try {

            $categoryLevel1= new category_level_1();
            $categoryLevel1->category_level_1 = $request->get('txtCategorylevel1');


            if ($categoryLevel1->save()) {

                return response()->json(['status' => true]);
            } else {
                Log::error('Error saving common setting: ' . print_r($categoryLevel1->getErrors(), true));
                return response()->json(['status' => false]);
            }
        } catch (Exception $ex) {
            return response()->json(['error' => $ex]);
        }
    }

    //.....lavel1 Edite.......

    public function categorylevel1Edite($id){
        $level1 = category_level_1::find($id);
		return response()->json($level1);
    }

    //...........leval1 update...
    public function txtCategorylevel1Update(Request $request,$id){
        $lavel1 = category_level_1::findOrFail($id)->update([
            'category_level_1' => $request->txtCategorylevel1,
        ]);
        return response()->json($lavel1);

    }


    // category Level 1 Status update

    public function catLevel1tStatus(Request $request,$id){
        $level1 = category_level_1::findOrFail($id);
        $level1->is_active = $request->status;
        $level1->save();

        return response()->json(' status updated successfully');
    }

    // category level 1 Search......
    public function categoryLevel1search(Request $request)
    {
        $output = "";
        $level1 = category_level_1::where('item_category_level_1_id', 'Like', '%' . $request->search . '%')
                                  ->orWhere('category_level_1', 'Like', '%' . $request->search . '%')
                                  ->get();

        $rowIndex = 0; // Initialize rowIndex to start from 0

        foreach ($level1 as $level1) {
            $status = $level1->is_active == 1 ? 'checked' : '';
            $rowClass = $rowIndex % 2 === 0 ? 'even-row' : 'odd-row';

            $output .= '
                <tr class="' . $rowClass . '">
                    <td>' . $level1->item_category_level_1_id . '</td>
                    <td>' . $level1->category_level_1 . '</td>
                    <td>
                        <a href="" type="button" class="btn btn-primary categorylevel1" id="' . $level1->item_category_level_1_id . '" data-bs-toggle="modal" data-bs-target="#modelcategoryLevel">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                        <input type="button" class="btn btn-danger" name="switch_single" id="btnCategorylevel1" value="Delete" onclick="btnCategorylevel1Delete(' . $level1->item_category_level_1_id . ')">
                    </td>
                    <td>
                        <label class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="switch_single" id="cbxCategorylevel1" value="1" onclick="cbxCategorylevel1Status(' . $level1->item_category_level_1_id . ')" required ' . $status . '>
                        </label>
                    </td>
                </tr>';

            $rowIndex++; // Increment rowIndex for each iteration
        }

        return response($output);
    }

        public function deletelevel1($id){

            $level1 = category_level_1::find($id);
            if($level1->item_category_level_1_id  == 1){
                return response()->json(['error' => 'Record has been Not Delete']);
            }else{

                $level1->delete();
            return response()->json(['success'=>'Record has been Delete']);
            }
        }


//#################   Level 2 ##########
public function loadCategory2(){
    $data = category_level_1::orderBy('item_category_level_1_id','ASC' )->get();
return response()->json( $data );
}
public function categoryLevel2Data()
{
    try {
        $customerDetails = DB::table('item_category_level_2s')
            ->join('item_category_level_1s', 'item_category_level_2s.Item_category_level_1_id', '=', 'item_category_level_1s.item_category_level_1_id')
            ->select('item_category_level_2s.Item_category_level_2_id', 'item_category_level_2s.category_level_2', 'item_category_level_1s.category_level_1', 'item_category_level_2s.is_active')
            ->orderBy('item_category_level_1s.item_category_level_1_id', 'DESC')
            ->distinct()
            ->get();

        if ($customerDetails->isEmpty()) {
            return response()->json(['error' => 'Data is not loaded']);
        }

        return response()->json(['success' => 'Data loaded', 'data' => $customerDetails]);
    } catch (\Exception $ex) {
        // Log the error for debugging purposes
        Log::error($ex);

        return response()->json(['error' => 'An error occurred while loading data']);
    }
}


//...........save data.....
public function saveCategoryLevel2(Request $request){

    $validatedData = $request->validate([
        'cmbLeve1' => 'required',
        'txtCategorylevel2' => 'required',
    ]);
    try {

        $categoryLevel2= new category_level_2();
        $categoryLevel2->Item_category_level_1_id= $request->get('cmbLeve1');
        $categoryLevel2->category_level_2 = $request->get('txtCategorylevel2');

        if ($categoryLevel2->save()) {

            return response()->json(['status' => true]);
        } else {
            Log::error('Error saving common setting: ' . print_r($categoryLevel2->getErrors(), true));
            return response()->json(['status' => false]);
        }
    } catch (Exception $ex) {
        return response()->json(['error' => $ex]);
    }
}

//.....lavel1 Edite.......

public function categorylevel2Edite($id){
    $level1 = category_level_2::find($id);
    return response()->json($level1);
}

//...........leval1 update...
public function txtCategorylevel2Update(Request $request,$id){
    $lavel1 = category_level_2::findOrFail($id)->update([
        'Item_category_level_1_id' => $request->cmbLeve1,
        'category_level_2' => $request->txtCategorylevel2,
    ]);
    return response()->json($lavel1);

}

 // category Level 2 Status update


public function deletelevel2($id){

    $level2 = category_level_2::find($id);
    if($level2->Item_category_level_2_id   == 1){
        return response()->json(['error' => 'Record has been Not Delete']);
    }else{

        $level2->delete();
    return response()->json(['success'=>'Record has been Delete']);
    }
}
public function catLevel2tStatus(Request $request,$id){
    $level1 = category_level_2::findOrFail($id);
    $level1->is_active = $request->status;
    $level1->save();

    return response()->json(' status updated successfully');
}





//#################   Level 3 ##########
public function loadCaegory3(){
    $data = category_level_2::orderBy('Item_category_level_2_id','ASC' )->get();
return response()->json( $data );
}
public function categoryLevel3Data()
{
    try {
        $customerDetails = DB::table('item_category_level_3s')
            ->join('item_category_level_2s', 'item_category_level_3s.Item_category_level_2_id', '=', 'item_category_level_2s.Item_category_level_2_id')
            ->select('item_category_level_3s.Item_category_level_3_id', 'item_category_level_3s.category_level_3', 'item_category_level_2s.category_level_2', 'item_category_level_3s.is_active')
            ->orderBy('item_category_level_3s.Item_category_level_3_id', 'DESC')
            ->distinct()
            ->get();

        if ($customerDetails->isEmpty()) {
            return response()->json(['error' => 'Data is not loaded']);
        }

        return response()->json(['success' => 'Data loaded', 'data' => $customerDetails]);
    } catch (\Exception $ex) {
        // Log the error for debugging purposes
        Log::error($ex);

        return response()->json(['error' => 'An error occurred while loading data']);
    }
}

//...........save data.....
public function saveCategoryLevel3(Request $request){
    $validatedData = $request->validate([
        'txtCategorylevel3' => 'required',
        'cmbLeve2' => 'required',
    ]);
    try {

        $categoryLevel3= new category_level_3();
        $categoryLevel3->category_level_3 = $request->get('txtCategorylevel3');
        $categoryLevel3->Item_category_level_2_id = $request->get('cmbLeve2');




        if ($categoryLevel3->save()) {

            return response()->json(['status' => true]);
        } else {
            Log::error('Error saving common setting: ' . print_r($categoryLevel3->getErrors(), true));
            return response()->json(['status' => false]);
        }
    } catch (Exception $ex) {
        return response()->json(['error' => $ex]);
    }
}

//.....lavel1 Edite.......

public function categorylevel3Edite($id){

    $data = category_level_3::find($id);
    return response()->json($data);
}

//...........leval1 update...
public function Categorylevel3Update(Request $request,$id){
    $lavel3 = category_level_3::findOrFail($id)->update([
        'Item_category_level_2_id' => $request->cmbLeve2,
        'category_level_3' => $request->txtCategorylevel3,
    ]);
    return response()->json($lavel3);

}


 // category Level 3 Status update

 public function catLevel3tStatus(Request $request,$id){
    $level1 = category_level_3::findOrFail($id);
    $level1->is_active = $request->status;
    $level1->save();

    return response()->json(' status updated successfully');
}




    public function deletelevel3($id){

        $level3 = category_level_3::find($id);
        if($level3->Item_category_level_3_id    == 1){
            return response()->json(['error' => 'Record has been Not Delete']);
        }else{

            $level3->delete();
        return response()->json(['success'=>'Record has been Delete']);
        }
    }



    ///.........Desgination..................................

    //..all disginstion.

    public function disginationData(){

        try {
            $customerDteails = employee_designation::all();
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



    //..add disginstion.

    public function saveDesgination(Request $request){
        $validatedData = $request->validate([
            'txtDesgination' => 'required',

        ]);

        try {

            $designation= new employee_designation();
            $designation->employee_designation = $request->get('txtDesgination');


            if ($designation->save()) {

                return response()->json(['status' => true]);
            } else {
                Log::error('Error saving common setting: ' . print_r($designation->getErrors(), true));
                return response()->json(['status' => false]);
            }
        } catch (Exception $ex) {
            return response()->json(['error' => $ex]);
        }
    }

    //edite desgination

    public function desginationEdite($id){
        $level1 = employee_designation::find($id);
    return response()->json($level1);
    }


    public function desginationtUpdate(Request $request,$id){

        $lavel1 = employee_designation::findOrFail($id)->update([
            'employee_designation' => $request->txtDesgination,
        ]);
        return response()->json($lavel1);

    }

    //update desgination status

    public function updateDesginationStatus(Request $request,$id){

        $level1 = employee_designation::findOrFail($id);
        $level1->is_active = $request->status;
        $level1->save();

        return response()->json(' status updated successfully');

    }


    // desgination Delete

    public function deletedesgination($id){
        $level1 = employee_designation::find($id);
            $level1->delete();
        return response()->json(['success'=>'Record has been Delete']);
    }


    ///###########.............Status ....................###############endregion



    ///.........Desgination..................................

    //..all disginstion.

    public function empStatusData(){
        try {
            $customerDteails = employee_Status::all();
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



    //..add disginstion.

    public function empSaveStatus(Request $request){
        $validatedData = $request->validate([
            'txtStatus' => 'required',

        ]);
        try {

            $designation= new employee_Status();
            $designation->employee_status = $request->get('txtStatus');


            if ($designation->save()) {

                return response()->json(['status' => true]);
            } else {
                Log::error('Error saving common setting: ' . print_r($designation->getErrors(), true));
                return response()->json(['status' => false]);
            }
        } catch (Exception $ex) {
            return response()->json(['error' => $ex]);
        }
    }

    //edite desgination

    public function empStatusEdite($id){
        $level1 = employee_Status::find($id);
    return response()->json($level1);
    }


    public function empStatusUpdate(Request $request,$id){

        $lavel1 = employee_Status::findOrFail($id)->update([
            'employee_status' => $request->txtStatus,
        ]);
        return response()->json($lavel1);

    }

    //update desgination status

    public function updateempStatus(Request $request,$id){

        $level1 = employee_Status::findOrFail($id);
        $level1->is_active = $request->status;
        $level1->save();

        return response()->json(' status updated successfully');

    }

    // desgination serch

    public function empStatussearch(Request $request)
    {
        $output = "";
        $rowIndex = 0; // Initialize rowIndex to start from 0

        $level1 = employee_Status::where('employee_status_id', 'Like', '%' . $request->search . '%')
                                ->orWhere('employee_status', 'Like', '%' . $request->search . '%')
                                ->get();

        foreach ($level1 as $level1) {
            $status = $level1->is_active == 1 ? 'checked' : '';
            $rowClass = $rowIndex % 2 === 0 ? 'even-row' : 'odd-row';

            $output .= '
                <tr class="' . $rowClass . '">
                    <td>' . $level1->employee_status_id . '</td>
                    <td>' . $level1->employee_status . '</td>
                    <td>
                        <a href="" type="button" class="btn btn-primary editEmpStatus" id="' . $level1->employee_status_id . '" data-bs-toggle="modal" data-bs-target="#modelStatus1">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                        <input type="button" class="btn btn-danger" name="switch_single" id="btnEmpStatus" value="Delete" onclick="btnEmpStatusDelete(' . $level1->employee_status_id . ')">
                    </td>
                    <td>
                        <label class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="switch_single" id="cbxEmpStatus" value="1" onclick="cbxEmpStatus(' . $level1->employee_status_id . ')" required ' . $status . '>
                        </label>
                    </td>
                </tr>';

            $rowIndex++; // Increment rowIndex for each iteration
        }

        return response($output);
    }

    // desgination Delete

    public function deleteempStatus($id){
        $level1 = employee_Status::find($id);
            $level1->delete();
        return response()->json(['success'=>'Record has been Delete']);
    }



    public function category2(){
        $data = category_level_1::orderBy('item_category_level_1_id','ASC' )->get();
        return response()->json($data);
    }


    public function category3(){
        $data = category_level_2::orderBy('Item_category_level_2_id','ASC' )->get();
        return response()->json($data);
    }




}



