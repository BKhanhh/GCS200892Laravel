<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Quản lý sản phẩm
Route::get ('/admin/adminViewProductIndexBlade', [ProductController::class, 'adminFunctionViewProduct'])->middleware('isLoggedInAdmin');
Route::get ('/admin/adminAddProductBlade', [ProductController::class, 'adminFunctionAddProductChooseCategory'])->middleware('isLoggedInAdmin');

Route::post('adminAddProductStore',[ProductController::class,'adminFunctionAddProductStore']);
//nếu không kiếm thấy adminProductStore.blade.php thì nó sẽ tự kiếm function trùng khớp trong tất cả file .blade.php

Route::get ('/admin/adminEditProductBlade/{adminEditProductId}', [ProductController::class, 'adminFunctionEditProduct'])->middleware('isLoggedInAdmin');
Route::post('adminEditProductStore',[ProductController::class,'adminFunctionEditProductStore']);
Route::get('adminDeleteProduct/{adminDeleteProductId}',[ProductController::class,'adminFunctionDeleteProduct']);

//Admin trang chủ
Route::get('admin/adminHomepageBlade',[AdminController::class,'adminFunctionHomepage'])->middleware('isLoggedInAdmin');

//Admin Login
Route::get('admin/adminLoginPageBlade',[AdminController::class,'adminFunctionLoginPageBlade']);

//Admin Logout
Route::get('admin/adminLogout',[AdminController::class,'adminFunctionLogout'])->name('adminLogout');

//Admin Check Login
Route::post('adminCheckLogin',[AdminController::class,'adminFunctionCheckLogin'])->name('adminCheckLogin');

//Customer Homepage
Route::get('customer/customerHomepageBlade',[ProductController::class,'customerFunctionHomepage']);
