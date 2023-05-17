<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LimitlessController;
use App\Http\Controllers\CategoryLevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Suply_groupController;
use App\Http\Controllers\International_nonproprietaryController;
use App\Http\Controllers\customerAppuseController;
use App\Models\User;
use App\Notifications\UserNotification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    Auth::attempt(['email' => 'admin@themesbrand.com', 'password' => '12345678'], true);

    $notificationData = [
        'data' => "This is Notification",
        'link' => "/"
    ];
    //User::find(1)->notify(new UserNotification($notificationData));
    return view('dashboard');
});
 */

Route::get('/', function () {
    return view('customer');
});

Route::get('/customer_list', function () {
    return view('customer_list');
});

Route::get('/customer_sample', function () {
    return view('customer_sample');
});

Route::get('/customer2', function () {
    return view('customer2');
});

Route::get('/customer_form', function () {
    return view('form');
});


Route::get('/readNotification/{id}', function ($id) {
    $notification = auth()->user()->notifications()->where('id', $id)->first();

    if ($notification) {
        $notification->markAsRead();
        return redirect($notification->data['link']);
    }
    return redirect('/');
});

Auth::routes();

Route::get('/save', [LimitlessController::class, 'save']);
Route::get('/update/{id}', [LimitlessController::class, 'update']);
Route::post('/CustomerController/saveCustomer',[CustomerController::class,'saveCustomer']);
Route::post('/FormController/saveCustomer',[FormController::class,'saveCustomer']);


//Model Close
Route::post('/close', [International_nonproprietaryController::class, 'close']);
//...............................Employeee............

Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index']);
Route::post('/saveEmployee', [App\Http\Controllers\EmployeeController::class, 'saveEmployee']);

//.....................Employee view update delete
Route::get('/employeeList',function(){
    return view('employeeList');
});
Route::get('/getEmployeeDetails',[App\Http\Controllers\EmployeeController::class,'getEmployeeDetails']);
Route::get('/getEmployeedata/{id}', [App\Http\Controllers\EmployeeController::class, 'getEmployeedata']);
Route::post('/Employee/update/{id}', [App\Http\Controllers\EmployeeController::class, 'employeeUpdate']);
Route::get('/getEmployeeview/{id}',[App\Http\Controllers\EmployeeController::class,'getEmployview']);
Route::delete('/deleteEmployee/{id}', [App\Http\Controllers\EmployeeController::class, 'employeeDelete']);


//.......common_setting..........


Route::get('/commonSetting', [App\Http\Controllers\CommonsettingController::class, 'index'])->middleware('is.logged');



//..district
Route::get('/districtData', [App\Http\Controllers\CommonsettingController::class,'districtData']);
Route::post('/saveDistrict', [App\Http\Controllers\CommonsettingController::class, 'saveDistrict']);
Route::get('/districtEdite/{id}', [App\Http\Controllers\CommonsettingController::class,'districtEdite']);
Route::post('/districtUpdate/{id}', [App\Http\Controllers\CommonsettingController::class, 'districtUpdate']);
Route::post('/updateDistrictStatus/{id}', [App\Http\Controllers\CommonsettingController::class, 'districtStatus']);

Route::get('/dist_search', [App\Http\Controllers\CommonsettingController::class,'dist_search']);

Route::get('/save_town_status', [App\Http\Controllers\CommonsettingController::class,'save_town_status']);
Route::delete('/deleteDistrict/{id}', [App\Http\Controllers\CommonsettingController::class,'deleteDistrict']);




//..Town
Route::get('/twonAlldata', [App\Http\Controllers\CommonsettingController::class,'twonAlldata']);
Route::post('/saveTown', [App\Http\Controllers\CommonsettingController::class, 'saveTown']);
Route::get('/townEdite/{id}', [App\Http\Controllers\CommonsettingController::class,'townEdite']);
Route::post('/townUpdate/{district_id}', [App\Http\Controllers\CommonsettingController::class, 'townUpdate']);
Route::get('/town_search', [App\Http\Controllers\CommonsettingController::class,'town_search']);
Route::post('/townUpdateStatus/{id}', [App\Http\Controllers\CommonsettingController::class,'townUpdateStatus']);
Route::get('/updateStatusTown/{id}', [App\Http\Controllers\CommonsettingController::class,'updateStatusTown']);
Route::delete('/deleteTown/{id}', [App\Http\Controllers\CommonsettingController::class,'deleteTown']);
Route::get('loadDistrict',[App\Http\Controllers\CommonsettingController::class,'loadDistrict']);
//..Group
Route::get('/groupAlldata', [App\Http\Controllers\CommonsettingController::class,'groupAlldata']);
Route::post('/saveGroup', [App\Http\Controllers\CommonsettingController::class, 'saveGroup']);
Route::get('/groupEdite/{id}', [App\Http\Controllers\CommonsettingController::class,'groupEdite']);
Route::post('/groupUpdate/{id}', [App\Http\Controllers\CommonsettingController::class, 'groupUpdate']);
Route::get('/group_search', [App\Http\Controllers\CommonsettingController::class,'group_search']);
Route::post('/groupUpdateStatus/{id}', [App\Http\Controllers\CommonsettingController::class,'groupUpdateStatus']);
Route::get('/updateStatusGroup/{id}', [App\Http\Controllers\CommonsettingController::class,'updateStatusGroup']);
Route::delete('/deleteGroup/{id}', [App\Http\Controllers\CommonsettingController::class,'deleteGroup']);

//..Grade
Route::get('/gradeAlldata', [App\Http\Controllers\CommonsettingController::class,'gradeAlldata']);
Route::post('/savegrade', [App\Http\Controllers\CommonsettingController::class, 'savegrade']);
Route::get('/gradeEdite/{id}', [App\Http\Controllers\CommonsettingController::class,'gradeEdite']);
Route::post('/gradeUpdate/{id}', [App\Http\Controllers\CommonsettingController::class, 'gradeUpdate']);
Route::get('/grade_search', [App\Http\Controllers\CommonsettingController::class,'grade_search']);
Route::post('/gradeUpdateStatus/{id}', [App\Http\Controllers\CommonsettingController::class,'gradeUpdateStatus']);
Route::get('/updateStatusGrade/{id}', [App\Http\Controllers\CommonsettingController::class,'updateStatusGrade']);
Route::delete('/deleteGrade/{id}', [App\Http\Controllers\CommonsettingController::class,'deleteGrade']);

////////////////////////// Category lavel ///////////

// level 1
Route::get('/categoryLeveldata', [CategoryLevelController::class,'categoryLevel1Data']);
Route::post('/saveCategoryLevel1', [CategoryLevelController::class,'saveCategoryLevel1']);
Route::get('/categorylevel1Edite/{id}', [CategoryLevelController::class,'categorylevel1Edite']);
Route::post('/txtCategorylevel1Update/{id}', [CategoryLevelController::class, 'txtCategorylevel1Update']);
Route::post('/updateCatLevel1tStatus/{id}', [CategoryLevelController::class, 'catLevel1tStatus']);
Route::get('/catLevel1_search', [CategoryLevelController::class,'categoryLevel1search']);
Route::delete('/deletelevel1/{id}', [CategoryLevelController::class,'deletelevel1']);

// Level 2
Route::get('/categoryLevel2Data', [CategoryLevelController::class,'categoryLevel2Data']);
Route::post('/saveCategoryLevel2', [CategoryLevelController::class,'saveCategoryLevel2']);
Route::get('/categorylevel2Edite/{id}', [CategoryLevelController::class,'categorylevel2Edite']);
Route::post('/txtCategorylevel2Update/{id}', [CategoryLevelController::class, 'txtCategorylevel2Update']);
Route::post('/updateCatLevel2tStatus/{id}', [CategoryLevelController::class, 'catLevel2tStatus']);
Route::get('/catLevel2_search', [CategoryLevelController::class,'categoryLevel2search']);
Route::delete('/deletelevel2/{id}', [CategoryLevelController::class,'deletelevel2']);
Route::get('loadcategory2',[CategoryLevelController::class,'loadCategory2']);
// Level 3
Route::get('/categoryLevel3Data', [CategoryLevelController::class,'categoryLevel3Data']);
Route::post('/saveCategoryLevel3', [CategoryLevelController::class,'saveCategoryLevel3']);
Route::get('/categorylevel3Edite/{id}', [CategoryLevelController::class,'categorylevel3Edite']);
Route::post('/Categorylevel3Update/{id}', [CategoryLevelController::class, 'Categorylevel3Update']);
Route::post('/updateCatLevel3tStatus/{id}', [CategoryLevelController::class, 'catLevel3tStatus']);
Route::get('/catLevel3_search', [CategoryLevelController::class,'categoryLevel3search']);
Route::delete('/deletelevel3/{id}', [CategoryLevelController::class,'deletelevel3']);
Route::get('loadcategory3',[CategoryLevelController::class,'loadCaegory3']);

// Distination

Route::post('/saveDesgination', [CategoryLevelController::class,'saveDesgination']);
Route::get('/disginationData', [CategoryLevelController::class,'disginationData']);
Route::get('/desginationEdite/{id}', [CategoryLevelController::class,'desginationEdite']);
Route::post('/desginationtUpdate/{id}', [CategoryLevelController::class, 'desginationtUpdate']);
Route::post('/updateDesginationStatus/{id}', [CategoryLevelController::class, 'updateDesginationStatus']);
Route::get('/desginathionsearch', [CategoryLevelController::class,'desginathionsearch']);
Route::delete('/deletedesgination/{id}', [CategoryLevelController::class,'deletedesgination']);


//  Employee Status

Route::post('/empSaveStatus', [CategoryLevelController::class,'empSaveStatus']);
Route::get('/empStatusData', [CategoryLevelController::class,'empStatusData']);
Route::get('/empStatusEdite/{id}', [CategoryLevelController::class,'empStatusEdite']);
Route::post('/empStatusUpdate/{id}', [CategoryLevelController::class, 'empStatusUpdate']);
Route::post('/updateempStatus/{id}', [CategoryLevelController::class, 'updateempStatus']);
Route::get('/empStatussearch', [CategoryLevelController::class,'empStatussearch']);
Route::delete('/deleteempStatus/{id}', [CategoryLevelController::class,'deleteempStatus']);


//Login Page
Route::get('/Login_Page', function () {
    return view('login.login');
});

Route::post('/submitForm', [LoginController::class,'loginForm']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



//Suply Group
Route::get('/suply_group', function () {
    return view('suply_group');
});
Route::get('/suplyGroupAllData', [Suply_groupController::class,'suplyGroupAllData']);
Route::post('/saveSuplyGroup', [Suply_groupController::class,'saveSuplyGroup']);
Route::get('/suplyGroupEdite/{id}', [Suply_groupController::class,'suplyGroupEdite']);
Route::post('/supltGroupUpdate/{id}', [Suply_groupController::class, 'supltGroupUpdate']);
Route::post('/suplyGroupStatus/{id}', [Suply_groupController::class, 'suplyGroupStatus']);
Route::get('/suplyGroupsearch', [Suply_groupController::class,'suplyGroupsearch']);
Route::delete('/deleteSuplygroup/{id}', [Suply_groupController::class,'deleteSuplygroup']);



//nonproprietary
Route::get('/item_altenative_name', function () {
    return view('item_altenative_name');
});
Route::get('/nonproprietaryAllData', [International_nonproprietaryController::class,'nonproprietaryAllData']);
Route::post('/saveNonproprietary', [International_nonproprietaryController::class,'nonproprietaryGroup']);
Route::get('/nonproprietaryEdite/{id}', [International_nonproprietaryController::class,'nonproprietaryEdite']);
Route::post('/nonproprietaryUpdate/{id}', [International_nonproprietaryController::class, 'nonproprietaryUpdate']);
Route::post('/nonproprietaryStatus/{id}', [International_nonproprietaryController::class, 'nonproprietaryStatus']);
Route::get('/nonproprietarysearch', [International_nonproprietaryController::class,'nonproprietarysearch']);
Route::delete('/deleteNonproprietary/{id}', [International_nonproprietaryController::class,'deleteNonproprietary']);


//customer Appuser


Route::get('/customer_Appuser', [customerAppuseController::class,'index']);
Route::get('/customeruserApp', [customerAppuseController::class,'customeruserApp']);
Route::post('/saveCustomeerUserapp', [customerAppuseController::class,'savecustomerUserApp']);
Route::get('/customerEdit/{id}', [customerAppuseController::class,'customerEdit']);
Route::post('/customerAppUpdate/{id}', [customerAppuseController::class, 'customerAppUpdate']);
Route::get('/customerAppSearch', [customerAppuseController::class, 'customerAppsearch']);
Route::post('/customerAppStatus/{id}', [customerAppuseController::class,'customerAppStatus']);
Route::delete('/deletecustomerApp/{id}', [customerAppuseController::class,'deletecustomerApp']);
Route::get('/customername', [customerAppuseController::class, 'customername']);

