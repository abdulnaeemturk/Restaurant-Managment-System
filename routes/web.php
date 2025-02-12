<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RestaurantFoodController;
use App\Http\Controllers\RestaurantOrderController;
use App\Http\Controllers\RestaurantOrderDetailController;
use App\Http\Controllers\RestaurantFoodDetailController;
use App\Http\Controllers\RestaurantTableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantFoodCategoryController;
use App\Http\Controllers\RestaurantTableLocationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\FoodChefController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\RestaurantLinkTableUserController;

use Illuminate\Http\Request;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AdminDashboardController::class, 'dashboard']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('orderfood',[GuestController::class, 'index']);
Route::get('addfoodtoorder/{food_id}',[GuestController::class, 'addFoodToOrder']);
Route::get('getfoodorderdetail',[GuestController::class, 'fetchFoodOrderDetail']);
Route::get('increaseOrDecreseQuantity/{temporaryorderid}/{piece}/{increasedecrease}',[GuestController::class, 'increaseOrDecreseQuantity']);
Route::get('deletecurrenttemporaryfood/{temporaryorderid}',[GuestController::class, 'deleteIt']);
Route::get('completetheorderpayment',[GuestController::class, 'completeTheOrderPayment']);
Route::get('printorder/{id}',[RestaurantOrderController::class, 'printOrder']);

// shared Rouets and reports
Route::get('admin/reports/dashboard/',[ReportsController::class, 'index']);
Route::get('shared/reports/completedorder/{_start_date?}/{_end_date?}/{per_page?}/{pagenumber?}/{fulltableorrecords?}',[ReportsController::class, 'completedOrder']);



Route::group(['middleware' => ['auth'],], function() {
    
    Route::get('dashboard', [AdminDashboardController::class, 'dashboard']);
    
    // this area will check to prepare food and drinks
    Route::get('admin/foodchef',[FoodChefController::class, 'index']);
    Route::get('admin/updatefoodstatus/{id}',[FoodChefController::class, 'updateOrderStatus']);
    Route::get('admin/getkitchenbysatus/{status}',[FoodChefController::class, 'getkitchenBySatus']);
    Route::get('admin/printkitchenorder/{id}',[FoodChefController::class, 'printOrder']);


    // this route fill provide all CRUD functionality for a single entity
    // this route belongs to the food
    Route::resource('admin/food', RestaurantFoodController::class);
    Route::get('admin/foodlistusingpagination/{per_page?}/{pagenumber?}/{fulltableorrecords?}',[RestaurantFoodController::class, 'fetchRecords']);

    // this route belongs to the Order
    Route::resource('admin/order', RestaurantOrderController::class);
    Route::get('admin/orderlistusingpagination/{per_page?}/{pagenumber?}/{fulltableorrecords?}',[RestaurantOrderController::class, 'fetchRecords']);
    Route::get('admin/paid/{id}',[RestaurantOrderController::class, 'paid']);
    Route::get('admin/printorder/{id}',[RestaurantOrderController::class, 'printOrder']);
    // all order functionalities with print
    Route::get('admin/orderdetail/{id}',[RestaurantOrderDetailController::class, 'index']);
    Route::get('admin/addfoodtoorder/{food_id}/{order_id}',[RestaurantOrderDetailController::class, 'addFoodToOrder']);
    Route::get('admin/increaseOrDecreseQuantity/{order_detail_id}/{piece}/{increasedecrease}',[RestaurantOrderDetailController::class, 'increaseOrDecreseQuantity']);


    // Route::get('orderfood',  function () {
    //     return view('customer.dashboard');
    // });
    // all order functionalities with print


    // this route belongs to the Table
    Route::resource('admin/table', RestaurantTableController::class);
    Route::get('admin/tablelistusingpagination/{per_page?}/{pagenumber?}/{fulltableorrecords?}',[RestaurantTableController::class, 'fetchRecords']);
    // this route belongs to the food detail
    Route::get('admin/fooddetail/{id}',[RestaurantFoodDetailController::class, 'index']);
    Route::resource('admin/fooddetails', RestaurantFoodDetailController::class);
    Route::get('admin/fooddetailslistusingpagination/{food_id}/{per_page?}/{pagenumber?}/{fulltableorrecords?}',[RestaurantFoodDetailController::class, 'fetchRecords']);
    Route::post('productimage',[RestaurantFoodDetailController::class, 'uploadImage']);
    // this route fill provide all CRUD functionality for a single entity
    // this route belongs to the foodcategory
      Route::resource('admin/setting/foodcategory', RestaurantFoodCategoryController::class);
      Route::get('admin/setting/foodcategorylistusingpagination/{per_page?}/{pagenumber?}/{fulltableorrecords?}',[RestaurantFoodCategoryController::class, 'fetchRecords']);
    
      // this route belongs to the tablelocation
      Route::resource('admin/setting/tablelocation', RestaurantTableLocationController::class);
      Route::get('admin/setting/tablelocationlistusingpagination/{per_page?}/{pagenumber?}/{fulltableorrecords?}',[RestaurantTableLocationController::class, 'fetchRecords']);
      
      // this route belongs to the linktableuser
      Route::resource('admin/setting/linktableuser', RestaurantLinkTableUserController::class);
      Route::get('admin/setting/linktableuserlistusingpagination/{per_page?}/{pagenumber?}/{fulltableorrecords?}',[RestaurantLinkTableUserController::class, 'fetchRecords']);



});

require __DIR__.'/auth.php';
