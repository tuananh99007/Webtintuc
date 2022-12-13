<?php

use App\Http\Controllers\Admin\AuthenticateController as AdminAuthenticateController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductsController as AdminProductsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Users\AuthenticateController as UsersAuthenticateController;
use App\Http\Controllers\Users\HomeController as UsersHomeController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/login', [AdminAuthenticateController::class, 'login'])->name('admin.authenticate.login');
Route::post('admin/postlogin', [AdminAuthenticateController::class, 'postlogin'])->name('admin.authenticate.postlogin');
Route::get('admin/logout', [AdminAuthenticateController::class, 'logout'])->name('admin.authenticate.logout');

Route::prefix('admin')->middleware('auth_admin')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/list', [AdminUsersController::class, 'list'])->name('admin.users.list');
        Route::get('/profile', [AdminUsersController::class, 'profile'])->name('admin.users.profile');
        Route::get('/add', [AdminUsersController::class, 'add'])->name('admin.users.add');
        Route::post('/postadd', [AdminUsersController::class, 'postadd'])->name('admin.users.postadd');
        Route::get('/detail', [AdminUsersController::class, 'detail'])->name('admin.users.detail');
        Route::get('/update', [AdminUsersController::class, 'update'])->name('admin.users.update');
        Route::post('/postupdate', [AdminUsersController::class, 'postupdate'])->name('admin.users.postupdate');
        Route::get('/delete', [AdminUsersController::class, 'delete'])->name('admin.users.delete');
        Route::get('/detailBin', [AdminUsersController::class, 'detailBin'])->name('admin.users.detailBin');
        Route::get('/restore', [AdminUsersController::class, 'restore'])->name('admin.users.restore');
        Route::get('/restoreAll', [AdminUsersController::class, 'restoreAll'])->name('admin.users.restoreAll');
        Route::get('/permanentlyDeleted', [AdminUsersController::class, 'permanentlyDeleted'])
            ->name('admin.users.permanentlyDeleted');
        Route::get('/permanentlyDeletedAll', [AdminUsersController::class, 'permanentlyDeletedAll'])
            ->name('admin.users.permanentlyDeletedAll');
    });

    Route::prefix('home')->group(function () {
        Route::get('/home', [AdminHomeController::class, 'home'])->name('admin.home.home');
    });

    Route::prefix('role')->group(function () {
        Route::get('/list', [RoleController::class, 'list'])->name('admin.role.list');
        Route::get('/add', [RoleController::class, 'add'])->name('admin.role.add');
        Route::post('/postadd', [RoleController::class, 'postadd'])->name('admin.role.postadd');
        Route::get('/update', [RoleController::class, 'update'])->name('admin.role.update');
        Route::post('/postupdate', [RoleController::class, 'postupdate'])->name('admin.role.postupdate');
        Route::get('/delete', [RoleController::class, 'delete'])->name('admin.role.delete');
    });

    Route::prefix('permission')->group(function () {
        Route::get('/list', [PermissionController::class, 'list'])->name('admin.permission.list');
        Route::get('/add', [PermissionController::class, 'add'])->name('admin.permission.add');
        Route::post('/postadd', [PermissionController::class, 'postadd'])->name('admin.permission.postadd');
        Route::get('/update', [PermissionController::class, 'update'])->name('admin.permission.update');
        Route::post('/postupdate', [PermissionController::class, 'postupdate'])->name('admin.permission.postupdate');
        Route::get('/delete', [PermissionController::class, 'delete'])->name('admin.permission.delete');
        Route::get('/perentList', [PermissionController::class, 'perentList'])->name('admin.permission.perentList');
    });


    Route::prefix('category')->group(function () {
        Route::get('/list', [AdminCategoryController::class, 'list'])->name('admin.category.list');
        Route::get('/add', [AdminCategoryController::class, 'add'])->name('admin.category.add');
        Route::post('/postadd', [AdminCategoryController::class, 'postadd'])->name('admin.category.postadd');
        Route::get('/detail', [AdminCategoryController::class, 'detail'])->name('admin.category.detail');
        Route::get('/update', [AdminCategoryController::class, 'update'])->name('admin.category.update');
        Route::post('/postupdate', [AdminCategoryController::class, 'postupdate'])->name('admin.category.postupdate');
        Route::get('/delete', [AdminCategoryController::class, 'delete'])->name('admin.category.delete');
        Route::get('/detailBin', [AdminCategoryController::class, 'detailBin'])->name('admin.category.detailBin');
        Route::get('/restore', [AdminCategoryController::class, 'restore'])->name('admin.category.restore');
        Route::get('/restoreAll', [AdminCategoryController::class, 'restoreAll'])->name('admin.category.restoreAll');
        Route::get('/permanentlyDeleted', [AdminCategoryController::class, 'permanentlyDeleted'])
            ->name('admin.category.permanentlyDeleted');
        Route::get('/permanentlyDeletedAll', [AdminCategoryController::class, 'permanentlyDeletedAll'])
            ->name('admin.category.permanentlyDeletedAll');
    });

    Route::prefix('product')->group(function () {
        Route::get('/list', [AdminProductsController::class, 'list'])->name('admin.product.list');
        Route::get('/add', [AdminProductsController::class, 'add'])->name('admin.product.add');
        Route::post('/postadd', [AdminProductsController::class, 'postadd'])->name('admin.product.postadd');
        Route::get('/detail', [AdminProductsController::class, 'detail'])->name('admin.product.detail');
        Route::get('/update', [AdminProductsController::class, 'update'])->name('admin.product.update');
        Route::post('/postupdate', [AdminProductsController::class, 'postupdate'])->name('admin.product.postupdate');
        Route::get('/delete', [AdminProductsController::class, 'delete'])->name('admin.product.delete');
        Route::get('/detailBin', [AdminProductsController::class, 'detailBin'])->name('admin.product.detailBin');
        Route::get('/restore', [AdminProductsController::class, 'restore'])->name('admin.product.restore');
        Route::get('/restoreAll', [AdminProductsController::class, 'restoreAll'])->name('admin.product.restoreAll');
        Route::get('/permanentlyDeleted', [AdminProductsController::class, 'permanentlyDeleted'])
            ->name('admin.product.permanentlyDeleted');
        Route::get('/permanentlyDeletedAll', [AdminProductsController::class, 'permanentlyDeletedAll'])
            ->name('admin.product.permanentlyDeletedAll');
        Route::get('/deleteComment', [AdminProductsController::class, 'deleteComment'])->name('admin.product.deleteComment');
    });
});

Route::get('users/login', [UsersAuthenticateController::class, 'login'])->name('users.authenticate.login');
Route::post('users/postlogin', [UsersAuthenticateController::class, 'postlogin'])->name('users.authenticate.postlogin');
Route::get('users/logout', [UsersAuthenticateController::class, 'logout'])->name('users.authenticate.logout');
Route::get('users/register', [UsersAuthenticateController::class, 'register'])->name('users.authenticate.register');
Route::post('users/postRegister', [UsersAuthenticateController::class, 'postRegister'])->name('users.authenticate.postRegister');
Route::get('users/forgotpassword', [UsersAuthenticateController::class, 'forgotpassword'])
    ->name('users.authenticate.forgotpassword');
Route::post('users/postforgotpassword', [UsersAuthenticateController::class, 'postforgotpassword'])
    ->name('users.authenticate.postforgotpassword');
Route::get('users/changepassword', [UsersAuthenticateController::class, 'changepassword'])
    ->name('users.authenticate.changepassword');
Route::post('users/postchangepassword', [UsersAuthenticateController::class, 'postchangepassword'])
    ->name('users.authenticate.postchangepassword');


Route::get('/', [UsersHomeController::class, 'index'])->name('users.home.index');
Route::prefix('users')->group(function () {
    Route::prefix('home')->group(function () {
        Route::get('/detail', [UsersHomeController::class, 'detail'])->name('users.home.detail');
        Route::get('/categoryDetail', [UsersHomeController::class, 'categoryDetail'])->name('users.home.categoryDetail');
        Route::get('/deleteComment', [UsersHomeController::class, 'deleteComment'])->name('users.home.deleteComment');
        Route::post('/postcomment', [UsersHomeController::class, 'postComment'])->name('users.home.postComment');
    });
});



