<?php

use App\Http\Controllers\CategoryLevelController;
use App\Http\Controllers\customerAppuseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\dataController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\International_nonproprietaryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LimitlessController;
use App\Http\Controllers\locationController;
use App\Http\Controllers\Suply_groupController;
use App\Models\User;
use App\Notifications\UserNotification;
use App\Http\Controllers\CommonsettingController;
use App\Http\Controllers\salesOrderController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\supplierItemCodeController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;

use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {
    Auth::attempt(['email' => 'admin@themesbrand.com', 'password' => '12345678'], true);

    $notificationData = [
        'data' => "This is Notification",
        'link' => "/"
    ];
    User::find(1)->notify(new UserNotification($notificationData));
    return view('dashboard');
});
 */
Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/customer', function () {
    return view('customer');
});

//old
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



Route::get('/purchaseorder', function () {
    return view('purchase_order_sample');
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
Route::GET('/getDistrictId',[CustomerController::class,'getDistrict']);
Route::GET('/getTownId/{id}',[CustomerController::class,'getTown']);
Route::get('/getCustomerGroupid',[CustomerController::class,'getCustomerGroup']);
Route::get('/getCustomerGradeId',[CustomerController::class,'getCustomerGrade']);
Route::post('/saveContact/{id}',[CustomerController::class,'addContactDetails']);
Route::get('/customerList',function(){
    return view('customerList');
});

Route::post('/addDeliveryPoint/{id}',[CustomerController::class,'addcustomerDeliveryPoints']);
Route::get('/getCustomerDetails',[CustomerController::class,'getCsutomerDetails']);
Route::get('/ViewCustomer',function(){
    return view('customerUpdate');
});

Route::get('/getCustomer/{id}',[CustomerController::class,'getEachCustomer']);
Route::post('/upload',[CustomerController::class,'uploadFile']);
Route::post('/updateCustomer/{id}',[CustomerController::class,'updateCustomer']);
Route::delete('/deleteCustomer/{id}',[CustomerController::class,'deleteCustomer']);
Route::get('/getEachContactData/{id}',[CustomerController::class,'getEachCustomerContact']);
Route::get('/getEachDeliveryPoint/{id}',[CustomerController::class,'getEachDeliveryPoint']);
Route::get('/searchNames',[CustomerController::class,'loadNames']);
Route::delete('/deleteCustomerContact/{id}',[CustomerController::class,'deleteCustomerContact']);
Route::delete('/deleteDeliveryPoint/{id}',[CustomerController::class,'deleteDeliveryPoint']);

//Item routes
Route::get('/item',function(){
    return view('item');
});

ROute::get('/itemList',function(){
    return view('itemList');
});

Route::post('/addItem',[ItemController::class,'addItem']);
Route::get('/getSupplyGroup',[ItemController::class,'getSupplyGroup']);
Route::get('/getCategoryLevelOne',[ItemController::class,'getCategoryLevelOne']);
Route::get('/getCategoryLevelTwo/{Cat_lvl_1_id}',[ItemController::class,'getCategoryLevelTwo']);
Route::get('/getCategoryLevelThree/{cat_lvl_2_id}',[ItemController::class,'getCategoryLevelThree']);
Route::get('/getItemDetails',[ItemController::class,'getItemDetails']);
Route::delete('/deleteItem/{id}',[ItemController::class,'deleteItem']);
Route::get('/geteachItem/{id}',[ItemController::class,'geteachItem']);
Route::post('/updateItem/{id}',[ItemController::class,'updateItem']);
Route::get('/searchItemNames',[ItemController::class,'searchItemNames']);


//location routes
Route::get('/location',function(){
    return view('location');
});

Route::get('/locationList',function(){
    return view('locationList');
});

Route::post('/addLocation',[locationController::class,'addLocation']);
Route::get('/getLocationTypes',[locationController::class,'getLocationTypes']);
Route::get('/getLocationDetails',[locationController::class,'getLocationDetails']);
Route::get('/getEachLocationDetails/{id}',[locationController::class,'getEachLocationDetails']);
Route::post('/updateLocation/{id}',[locationController::class,'updateLocation']);
Route::delete('/deleteLocation/{id}',[locationController::class,'deleteLocation']);

//customer location (list box)
Route::get('/assignCustomertoLocation',function(){
    return view('assignCustomertoLocation');
});
Route::get('/getCustomerDataTOlistbox/{id}',[dataController::class,'getFilterData']); // same for employee cystomer

Route::get('/getLocations',[dataController::class,'getLocations']);
Route::post('/addCustomerLocations',[dataController::class,'addCustomerLocation']);
Route::get('/getCustomerlocationDteails',[dataController::class,'getCustomerlocationDteails']);
Route::delete('/deleteCustomerLocation',[dataController::class,'deleteCustomerLocation']);

// employee customer (list box)
Route::get('/employeeCustomerView',function(){
    return view('employee_customer');
});
Route::get('/getEmployee',[dataController::class,'getEmployees']);
Route::get('/getEmployeeCustomerDetails',[dataController::class,'getEmployeeCustomerDetails']);
Route::post('/addEmployeeCustomer',[dataController::class,'addEmployeeCustomer']);
Route::delete('/deleteEmployeeCustomer',[dataController::class,'deleteEmployeeCustomer']);
Route::get('/empdesgnation',[App\Http\Controllers\EmployeeController::class,'empdesgnation']);
Route::get('/empreport',[App\Http\Controllers\EmployeeController::class,'empreport']);


//deleteEmployeeCustomer




//.......common_setting..........

Route::get('/commonSetting', [App\Http\Controllers\CommonsettingController::class, 'index']);

//..district
Route::get('/districtData', [App\Http\Controllers\CommonsettingController::class,'districtData']);
Route::post('/saveDistrict', [App\Http\Controllers\CommonsettingController::class, 'saveDistrict']);
Route::get('/districtEdite/{id}', [App\Http\Controllers\CommonsettingController::class,'districtEdite']);
Route::post('/districtUpdate/{id}', [App\Http\Controllers\CommonsettingController::class, 'districtUpdate']);
Route::post('/updateDistrictStatus/{id}', [App\Http\Controllers\CommonsettingController::class, 'districtStatus']);

Route::get('/save_town_status', [App\Http\Controllers\CommonsettingController::class,'save_town_status']);
Route::delete('/deleteDistrict/{id}', [App\Http\Controllers\CommonsettingController::class,'deleteDistrict']);




//..Town
Route::get('/twonAlldata', [App\Http\Controllers\CommonsettingController::class,'twonAlldata']);
Route::post('/saveTown', [App\Http\Controllers\CommonsettingController::class, 'saveTown']);
Route::get('/townEdite/{id}', [App\Http\Controllers\CommonsettingController::class,'townEdite']);
Route::post('/townUpdate/{district_id}', [App\Http\Controllers\CommonsettingController::class, 'townUpdate']);
Route::post('/townUpdateStatus/{id}', [App\Http\Controllers\CommonsettingController::class,'townUpdateStatus']);
Route::get('/updateStatusTown/{id}', [App\Http\Controllers\CommonsettingController::class,'updateStatusTown']);
Route::delete('/deleteTown/{id}', [App\Http\Controllers\CommonsettingController::class,'deleteTown']);
Route::get('loadDistrict',[App\Http\Controllers\CommonsettingController::class,'loadDistrict']);
Route::get('/towndistrict', [App\Http\Controllers\CommonsettingController::class, 'towndistrict']);
//..Group
Route::get('/groupAlldata', [App\Http\Controllers\CommonsettingController::class,'groupAlldata']);
Route::post('/saveGroup', [App\Http\Controllers\CommonsettingController::class, 'saveGroup']);
Route::get('/groupEdite/{id}', [App\Http\Controllers\CommonsettingController::class,'groupEdite']);
Route::post('/groupUpdate/{id}', [App\Http\Controllers\CommonsettingController::class, 'groupUpdate']);
Route::post('/groupUpdateStatus/{id}', [App\Http\Controllers\CommonsettingController::class,'groupUpdateStatus']);
Route::get('/updateStatusGroup/{id}', [App\Http\Controllers\CommonsettingController::class,'updateStatusGroup']);
Route::delete('/deleteGroup/{id}', [App\Http\Controllers\CommonsettingController::class,'deleteGroup']);

//..Grade
Route::get('/gradeAlldata', [App\Http\Controllers\CommonsettingController::class,'gradeAlldata']);
Route::post('/savegrade', [App\Http\Controllers\CommonsettingController::class, 'savegrade']);
Route::get('/gradeEdite/{id}', [App\Http\Controllers\CommonsettingController::class,'gradeEdite']);
Route::post('/gradeUpdate/{id}', [App\Http\Controllers\CommonsettingController::class, 'gradeUpdate']);
Route::post('/gradeUpdateStatus/{id}', [App\Http\Controllers\CommonsettingController::class,'gradeUpdateStatus']);
Route::get('/updateStatusGrade/{id}', [App\Http\Controllers\CommonsettingController::class,'updateStatusGrade']);
Route::delete('/deleteGrade/{id}', [App\Http\Controllers\CommonsettingController::class,'deleteGrade']);

// level 1
Route::get('/getCategorylevelOne', [CategoryLevelController::class,'categoryLevel1Data']);

Route::post('/saveCategoryLevel1', [CategoryLevelController::class,'saveCategoryLevel1']);
Route::get('/categorylevel1Edite/{id}', [CategoryLevelController::class,'categorylevel1Edite']);
Route::post('/txtCategorylevel1Update/{id}', [CategoryLevelController::class, 'txtCategorylevel1Update']);
Route::post('/updateCatLevel1tStatus/{id}', [CategoryLevelController::class, 'catLevel1tStatus']);
Route::delete('/deletelevel1/{id}', [CategoryLevelController::class,'deletelevel1']);

// Level 2
Route::get('/test', [CategoryLevelController::class,'categoryLevel2Data']);
Route::get('/categoryLevel2Data', [CategoryLevelController::class,'categoryLevel2Data']);
Route::post('/saveCategoryLevel2', [CategoryLevelController::class,'saveCategoryLevel2']);
Route::get('/categorylevel2Edite/{id}', [CategoryLevelController::class,'categorylevel2Edite']);
Route::post('/txtCategorylevel2Update/{id}', [CategoryLevelController::class, 'txtCategorylevel2Update']);
Route::post('/updateCatLevel2tStatus/{id}', [CategoryLevelController::class, 'catLevel2tStatus']);
Route::delete('/deletelevel2/{id}', [CategoryLevelController::class,'deletelevel2']);
Route::get('loadcategory2',[CategoryLevelController::class,'loadCategory2']);

// Level 3
Route::get('/categoryLevel3Data', [CategoryLevelController::class,'categoryLevel3Data']);
Route::post('/saveCategoryLevel3', [CategoryLevelController::class,'saveCategoryLevel3']);
Route::get('/categorylevel3Edite/{id}', [CategoryLevelController::class,'categorylevel3Edite']);
Route::post('/Categorylevel3Update/{id}', [CategoryLevelController::class, 'Categorylevel3Update']);
Route::post('/updateCatLevel3tStatus/{id}', [CategoryLevelController::class, 'catLevel3tStatus']);
Route::delete('/deletelevel3/{id}', [CategoryLevelController::class,'deletelevel3']);
Route::get('loadcategory3',[CategoryLevelController::class,'loadCaegory3']);

// Distination

Route::post('/saveDesgination', [CategoryLevelController::class,'saveDesgination']);
Route::get('/disginationData', [CategoryLevelController::class,'disginationData']);
Route::get('/desginationEdite/{id}', [CategoryLevelController::class,'desginationEdite']);
Route::post('/desginationtUpdate/{id}', [CategoryLevelController::class, 'desginationtUpdate']);
Route::post('/updateDesginationStatus/{id}', [CategoryLevelController::class, 'updateDesginationStatus']);
Route::delete('/deletedesgination/{id}', [CategoryLevelController::class,'deletedesgination']);


//  Employee Status

Route::post('/empSaveStatus', [CategoryLevelController::class,'empSaveStatus']);
Route::get('/empStatusData', [CategoryLevelController::class,'empStatusData']);
Route::get('/empStatusEdite/{id}', [CategoryLevelController::class,'empStatusEdite']);
Route::post('/empStatusUpdate/{id}', [CategoryLevelController::class, 'empStatusUpdate']);
Route::post('/updateempStatus/{id}', [CategoryLevelController::class, 'updateempStatus']);
Route::delete('/deleteempStatus/{id}', [CategoryLevelController::class,'deleteempStatus']);

// Vehicle Type

Route::get('/getVehicletype', [CategoryLevelController::class,'getVehicletype']);

Route::post('/saveVehicleType', [CategoryLevelController::class,'saveVehicleType']);
Route::get('/vehicletypeEdite/{id}', [CategoryLevelController::class,'vehicletypeEdite']);
Route::post('/vehicleTypeUpdate/{id}', [CategoryLevelController::class, 'vehicleTypeUpdate']);
Route::post('/updateVehicletypeStatus/{id}', [CategoryLevelController::class, 'vehicletypeStatus']);
Route::delete('/deleteVehicletype/{id}', [CategoryLevelController::class,'deleteVehicle']);


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
Route::get('/reportEmployee', [App\Http\Controllers\EmployeeController::class, 'reportEmployee']);
Route::get('/getemployeestatus',[App\Http\Controllers\EmployeeController::class,'employeestatus']);

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
Route::post('/close', [International_nonproprietaryController::class,'close']);

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

//...VEHICLE...
Route::get('/vehicle', function () {
    return view('vehicle');
});

Route::get('/vehicalTypename', [VehicleController::class, 'vehicaltypename']);
Route::get('/getvehicaleAlldata', [VehicleController::class,'vehicaleAlldata']);
Route::post('/savevehicle', [VehicleController::class,'savevehicle']);
Route::get('/getVehicaleEdit/{id}', [VehicleController::class,'vehicaleEdit']);
Route::post('/vehicaleupdate/{id}', [VehicleController::class, 'vehicaleUpdate']);
Route::post('/vehicleStatus/{id}', [VehicleController::class,'vehicleStatus']);
Route::delete('/deleteVehicale/{id}', [VehicleController::class,'deleteVehicale']);







//Login Page
Route::get('/', function () {
    return view('login.login');
});

Route::post('/submitForm', [LoginController::class,'loginForm']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




//test duallist box
Route::get('/testDual',function(){
    return view('testingduallistbox');
});


//...bank

Route::get('/bank', function () {
    return view('bank');
});
Route::get('/getBankAlldata', [BankController::class,'getBankalldata']);
Route::get('/searchBank', [BankController::class,'searchBank']);
Route::post('/savebank', [BankController::class,'banksave']);
Route::get('/getbannkEdit/{id}', [BankController::class,'getbannkEdit']);
Route::post('/bankupdate/{id}', [BankController::class, 'bankupdate']);
Route::post('/bankStatus/{id}', [BankController::class, 'bankStatus']);
Route::delete('/deletebank/{id}', [BankController::class,'deletebank']);

//branchers

Route::get('/getBranchAlldata/{id}', [BankController::class,'getBranchAlldata']);
Route::get('/searchBranch', [BankController::class,'searchbranch']);
Route::post('/saveBranch', [BankController::class,'savebranch']);
Route::get('/getbranchkEdit/{id}', [BankController::class,'getbranchkEdit']);
Route::post('/branchupdate/{id}', [BankController::class, 'branchupdate']);
Route::post('/branchstatus/{id}', [BankController::class, 'branchStatus']);
Route::delete('/deletebranch/{id}', [BankController::class,'deleteBranch']);



//...supplier item code

Route::get('/supplier_item_code', function () {
    return view('supplier_item_code');
});
Route::get('/suppliersname', [supplierItemCodeController::class, 'suppliersname']);
Route::get('/getItemdata', [supplierItemCodeController::class,'getitemdata']);
Route::post('/savesavesuppliers', [supplierItemCodeController::class,'savesavesuppliers']);


//........role.......


Route::get('/Role', function () {
    return view('role');
});


Route::get('/useroleAllData', [roleController::class,'getuserrole']);
Route::post('/saveUserrole', [roleController::class,'saveuserrole']);
Route::get('/useroleEdite/{id}', [roleController::class,'useroleEdite']);
Route::post('/userroleUpdate/{id}', [roleController::class, 'userroleUpdate']);
Route::post('/updateUserRoleStatus/{id}', [roleController::class, 'userRoleStatus']);
Route::delete('/deleteUserole/{id}', [roleController::class,'deleteUserole']);

//Role list
Route::get('/getuserData/{id}', [roleController::class,'getuserData']);

//.........users


Route::get('/user', function () {
    return view('users');
});
Route::get('/userrole', [UserController::class,'userrole']);
Route::get('/getemployee', [UserController::class,'getEmployee']);
Route::post('/savenewUser', [UserController::class,'saveuser']);


//....USER LIST

Route::get('/userlist', function () {
    return view('userList');
});
Route::get('/getuserAllData', [UserController::class,'getuserAlldata']);
Route::get('/usersEdite/{id}', [UserController::class,'usersEdite']);
Route::post('/updateUser/{id}', [UserController::class,'updateUser']);
Route::delete('/deleteusers/{id}', [UserController::class,'deleteusers']);


//.....Changee Password
Route::get('/changePassword', function () {
    return view('changPassword');
});
Route::post('/changePassword', [ChangePasswordController::class,'changePassword']);
