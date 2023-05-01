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


