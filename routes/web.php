<?php

use Illuminate\Support\Facades\Route;

/* Admin Controller
--------------------------------------*/
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\HandlerController;
use App\Http\Controllers\admin\UserController;
use App\Models\Post;

/*  Frontend Controller
--------------------------------------*/
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\FrontendPostController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\PrivacyController;
use App\Http\Controllers\frontend\SearchController;

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

Route::get('/superadmin', [DashboardController::class, 'index'])->middleware('guard');

Route::group(['prefix' => '/superadmin/post'], function () {
    Route::get('/', [PostController::class, 'posts']);
    Route::get('add', [PostController::class, 'addPost'])->name('post.add');
    Route::post('add', [PostController::class, 'createPost'])->name('post.create');
    Route::get('edit/{id}', [PostController::class, 'editPost'])->name('post.edit');
    Route::post('update/{id}', [PostController::class, 'updatePost'])->name('post.update');
    Route::get('delete/{id}', [PostController::class, 'deletePost'])->name('post.delete');
});

Route::group(['prefix' => '/superadmin/employees'], function () {
    Route::get('/', [EmployeeController::class, 'employees']);
    Route::get('add', [EmployeeController::class, 'addEmployee'])->name('employee.add');
    Route::post('add', [EmployeeController::class, 'createEmployee'])->name('employee.create');
    Route::get('edit/{id}', [EmployeeController::class, 'editEmployee'])->name('employee.edit');
    Route::post('update/{id}', [EmployeeController::class, 'updateEmployee'])->name('employee.update');
    Route::get('delete/{id}', [EmployeeController::class, 'deleteEmployee'])->name('employee.delete');
});

Route::group(['prefix' => '/superadmin/handlers'], function () {
    Route::get('/', [HandlerController::class, 'handlers']);
    Route::get('add', [HandlerController::class, 'addHandler'])->name('handler.add');
    Route::post('add', [HandlerController::class, 'createHandler'])->name('handler.create');
    Route::get('edit/{id}', [HandlerController::class, 'editHandler'])->name('handler.edit');
    Route::post('update/{id}', [HandlerController::class, 'updateHandler'])->name('handler.update');
    Route::get('delete/{id}', [HandlerController::class, 'deleteHandler'])->name('handler.delete');
});

Route::group(['prefix' => '/superadmin/foods'], function () {
    Route::get('/', [FoodController::class, 'foods']);
    Route::get('add', [FoodController::class, 'addFood'])->name('food.add');
    Route::post('add', [FoodController::class, 'createFood'])->name('food.create');
    Route::get('edit/{id}', [FoodController::class, 'editFood'])->name('food.edit');
    Route::post('update/{id}', [FoodController::class, 'updateFood'])->name('food.update');
    Route::get('delete/{id}', [FoodController::class, 'deleteFood'])->name('food.delete');
});

Route::group(['prefix' => '/superadmin/user'], function () {
    Route::get('password/change', [UserController::class, 'changePassword'])->name('password.change');
    Route::post('password/update', [UserController::class, 'updatePassword'])->name('password.update');
    Route::get('password/forgot', [UserController::class, 'forgotPassword'])->name('password.forgot');
    Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
});


Route::get('/superadmin/login', [UserController::class, 'login']);
Route::post('/superadmin/login', [UserController::class, 'loginUser'])->name('user.login');



/*  Frontend Routes
--------------------------------------*/
Route::get('/', [HomeController::class, 'index']);
Route::get('/search', [SearchController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/privacy', [PrivacyController::class, 'index']);
Route::get('/post/{slug}', [FrontendPostController::class, 'index'])->name('post.slug');
