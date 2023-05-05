<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\category_level_1;
use App\Models\category_level_2;
use App\Models\category_level_3;
use Dotenv\Exception\ValidationException;
use DB;
use Exception;


class CategoryLevelController extends Controller
{
    //......loard data ...
    public function categoryLevel1Data(){

        $data = category_level_1::all();
        return response()->json( $data );
    }

    //...........save data.....
    public function saveCategoryLevel1(Request $request){
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
        $level1->status_id = $request->status;
        $level1->save();

        return response()->json('District status updated successfully');
    }

    // category level 1 Search......

    public function categoryLevel1search(Request $request){

            $output="";
            $level1 = category_level_1::where('category_level_1_id','Like','%'.$request->search.'%')
                                    ->orWhere('category_level_1','Like','%'.$request->search.'%')
                                    ->get();


            foreach($level1 as $level1){

                $status = "";
                if($level1->status_id == 1){
                    $status = "checked";
                }

                $output.=

                '<tr>
                <td>'.$level1->category_level_1_id .' </td>
                <td>'.$level1->category_level_1.' </td>

                <td> '.' <a href=""  type="button" class="btn btn-primary  categorylevel1" id="' .$level1->category_level_1_id . '" data-bs-toggle="modal" data-bs-target="#modelcategoryLevel"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> '.'</td>

                <td> '.' <label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxCategorylevel1" value="1" onclick="cbxCategorylevel1Status('  .$level1->category_level_1_id .')" required  '.$status.'></label>  '.'</td>
                </tr>';
            }
            return response($output);

        }



//#################   Level 2 ##########

public function categoryLevel2Data(){

    $data = DB::table('category_level_2s')
            ->join('category_level_1s', 'category_level_2s.category_level_1_id', '=', 'category_level_1s.category_level_1_id')
            ->select('category_level_2s.category_level_2_id', 'category_level_2s.category_level_2', 'category_level_1s.category_level_1', 'category_level_2s.status_id')
            ->orderBy('category_level_1s.category_level_1_id', 'DESC')
            ->distinct()
            ->get();
    return response()->json($data);

}

//...........save data.....
public function saveCategoryLevel2(Request $request){
    try {

        $categoryLevel2= new category_level_2();
        $categoryLevel2->category_level_1_id = $request->get('cmbLeve1');
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
        'category_level_1_id' => $request->cmbLeve1,
        'category_level_2' => $request->txtCategorylevel2,
    ]);
    return response()->json($lavel1);

}

 // category Level 2 Status update

 public function catLevel2tStatus(Request $request,$id){
    $level1 = category_level_2::findOrFail($id);
    $level1->status_id = $request->status;
    $level1->save();

    return response()->json('District status updated successfully');
}


// category level 2 Search......
public function categoryLevel2search(Request $request){
    $data = DB::table('category_level_2s')
    ->join('category_level_1s', 'category_level_2s.category_level_1_id', '=', 'category_level_1s.category_level_1_id')
    ->select('category_level_2s.category_level_2_id', 'category_level_2s.category_level_2', 'category_level_1s.category_level_1', 'category_level_2s.status_id')
    ->orderBy('category_level_1s.category_level_1_id', 'DESC')
    ->distinct()
    ->get();


    $output="";

    $level2 = category_level_2::where('category_level_2_id','Like','%'.$request->search.'%')
                            ->orWhere('category_level_2','Like','%'.$request->search.'%')
                            ->get();


    foreach($level2 as $level2){
        $category1 = $data->where('category_level_2_id', $level2->category_level_2_id)->first();

        $status = "";
        if($level2->status_id == 1){
            $status = "checked";
        }

        $output.= '<tr>
            <td>'.$level2->category_level_2_id.' </td>
            <td>'.$category1->category_level_1.' </td>
            <td>' .$level2->category_level_2.'</td>
            <td> <a href="" type="button" class="btn btn-primary categorylevel2" id="' .$level2->category_level_2_id . '" data-bs-toggle="modal" data-bs-target="#modelcategoryLeve2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </td>
            <td> <label class="form-check form-switch"><input type="checkbox" class="form-check-input" name="switch_single" id="cbxCategorylevel2" value="1" onclick="cbxCategorylevel2Status('.$level2->category_level_2_id . ')" required '.$status.'></label>  </td>
        </tr>';
    }
    return response($output);
}




//#################   Level 3 ##########

public function categoryLevel3Data(){

    $data = DB::table('category_level_3s')
    ->join('category_level_2s', 'category_level_3s.category_level_2_id', '=', 'category_level_2s.category_level_2_id')
    ->select('category_level_3s.category_level_3_id', 'category_level_3s.category_level_3', 'category_level_2s.category_level_2', 'category_level_3s.status_id')
    ->orderBy('category_level_3s.category_level_3_id', 'DESC')
    ->distinct()
    ->get();
    return response()->json( $data );
}

//...........save data.....
public function saveCategoryLevel3(Request $request){
    try {

        $categoryLevel3= new category_level_3();
        $categoryLevel3->category_level_3 = $request->get('txtCategorylevel3');
        $categoryLevel3->category_level_2_id = $request->get('cmbLeve2');




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
        'category_level_2_id' => $request->cmbLeve2,
        'category_level_3' => $request->txtCategorylevel3,
    ]);
    return response()->json($lavel3);

}


 // category Level 3 Status update

 public function catLevel3tStatus(Request $request,$id){
    $level1 = category_level_3::findOrFail($id);
    $level1->status_id = $request->status;
    $level1->save();

    return response()->json('District status updated successfully');
}



// category level 3 Search......
public function categoryLevel3search(Request $request){

    $data = DB::table('category_level_3s')
    ->join('category_level_2s', 'category_level_3s.category_level_2_id', '=', 'category_level_2s.category_level_2_id')
    ->select('category_level_3s.category_level_3_id', 'category_level_3s.category_level_3', 'category_level_2s.category_level_2', 'category_level_3s.status_id')
    ->orderBy('category_level_3s.category_level_3_id', 'DESC')
    ->distinct()
    ->get();

        $output="";

        $level3 = category_level_3::where('category_level_3_id','Like','%'.$request->search.'%')
                                ->orWhere('category_level_3','Like','%'.$request->search.'%')
                                ->get();


        foreach($level3 as $level3){
            $category2 = $data->where('category_level_3_id', $level3->category_level_3_id)->first();

            $status = "";
            if($level3->status_id == 1){
                $status = "checked";
            }

            $output.= '<tr>
                <td>'.$level3->category_level_3_id.' </td>
                <td>'.$category2->category_level_2.' </td>
                <td>' .$level3->category_level_3.'</td>
                <td><a href=""  type="button" class="btn btn-primary  categorylevel3" id="'.$level3->category_level_3_id.'" data-bs-toggle="modal" data-bs-target="#modelcategoryLeve3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </td>
                <td> <label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxCategorylevel3" value="1" onclick="cbxCategorylevel3Status('.$level3->category_level_3_id.')" required '.$status.'></label>  </td>
            </tr>';
        }
        return response($output);
    }



}


