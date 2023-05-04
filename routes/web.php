<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LimitlessController;
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


Route::get('/commonSetting', [App\Http\Controllers\CommonsettingController::class, 'index']);



//..district
Route::get('/districtData', [App\Http\Controllers\CommonsettingController::class,'districtData']);
Route::post('/saveDistrict', [App\Http\Controllers\CommonsettingController::class, 'saveDistrict']);
Route::get('/districtEdite/{id}', [App\Http\Controllers\CommonsettingController::class,'districtEdite']);
Route::post('/districtUpdate/{id}', [App\Http\Controllers\CommonsettingController::class, 'districtUpdate']);
Route::post('/updateDistrictStatus/{id}', [App\Http\Controllers\CommonsettingController::class, 'districtStatus']);
//Route::get('/getDistrictStatus/{id}', [App\Http\Controllers\CommonsettingController::class,'getDistrictStatus']);
Route::get('/dist_search', [App\Http\Controllers\CommonsettingController::class,'dist_search']);

Route::get('/save_town_status', [App\Http\Controllers\CommonsettingController::class,'save_town_status']);



//..Town
Route::get('/twonAlldata', [App\Http\Controllers\CommonsettingController::class,'twonAlldata']);
Route::post('/saveTown', [App\Http\Controllers\CommonsettingController::class, 'saveTown']);
Route::get('/townEdite/{id}', [App\Http\Controllers\CommonsettingController::class,'townEdite']);
Route::post('/townUpdate/{district_id}', [App\Http\Controllers\CommonsettingController::class, 'townUpdate']);
Route::get('/town_search', [App\Http\Controllers\CommonsettingController::class,'town_search']);
Route::post('/townUpdateStatus/{id}', [App\Http\Controllers\CommonsettingController::class,'townUpdateStatus']);
Route::get('/updateStatusTown/{id}', [App\Http\Controllers\CommonsettingController::class,'updateStatusTown']);


//..Group
Route::get('/groupAlldata', [App\Http\Controllers\CommonsettingController::class,'groupAlldata']);
Route::post('/saveGroup', [App\Http\Controllers\CommonsettingController::class, 'saveGroup']);
Route::get('/groupEdite/{id}', [App\Http\Controllers\CommonsettingController::class,'groupEdite']);
Route::post('/groupUpdate/{id}', [App\Http\Controllers\CommonsettingController::class, 'groupUpdate']);
Route::get('/group_search', [App\Http\Controllers\CommonsettingController::class,'group_search']);
Route::post('/groupUpdateStatus/{id}', [App\Http\Controllers\CommonsettingController::class,'groupUpdateStatus']);
Route::get('/updateStatusGroup/{id}', [App\Http\Controllers\CommonsettingController::class,'updateStatusGroup']);


//..Grade
Route::get('/gradeAlldata', [App\Http\Controllers\CommonsettingController::class,'gradeAlldata']);
Route::post('/savegrade', [App\Http\Controllers\CommonsettingController::class, 'savegrade']);
Route::get('/gradeEdite/{id}', [App\Http\Controllers\CommonsettingController::class,'gradeEdite']);
Route::post('/gradeUpdate/{id}', [App\Http\Controllers\CommonsettingController::class, 'gradeUpdate']);
Route::get('/grade_search', [App\Http\Controllers\CommonsettingController::class,'grade_search']);
Route::post('/gradeUpdateStatus/{id}', [App\Http\Controllers\CommonsettingController::class,'gradeUpdateStatus']);
Route::get('/updateStatusGrade/{id}', [App\Http\Controllers\CommonsettingController::class,'updateStatusGrade']);




