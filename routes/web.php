<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EquipmentCategoryController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\SerialNumberEquipmentController;
use App\Http\Controllers\UserController;
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

Auth::routes();

//zasticene sve rute
Route::middleware(['auth'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/users', UserController::class);
Route::resource('/equipment_categories', EquipmentCategoryController::class);
Route::resource('/equipment', EquipmentController::class);
Route::get('/departments/positions-by-department/{department}', [DepartmentController::class, 'positions']);
Route::put('/serialNumber/create/new', [SerialNumberEquipmentController::class, 'inputSerialNumber']);
Route::get('/getEquipmentSerialNumber/{id}', [SerialNumberEquipmentController::class, 'getEquipmentSerialNumber']);
});
