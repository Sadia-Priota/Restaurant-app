<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\restoController;
use App\Http\Controllers\teacherController;
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

//echo "wwwwwww";
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get("home", [restoController::class,'index']);
//Route::get('/', [\App\Http\Controllers\restoController::class]);
Route::get("list",[restoController::class,'list']);
//Route::get("customer-list",[\App\Http\Controllers\CustomerController::class,'list'])->name('customer.list');
//Route::get("add",[\App\Http\Controllers\restoController::class,'add']);
Route::view("/add",'add');
Route::post("add",[restoController::class,'add'])->name('resto_insert');
Route::get("editform",[restoController::class,'editform']);
Route::get("edit/{id}",[restoController::class,'edit'])->name('resto_edit');
Route::post("edit/save",[restoController::class,'editSave'])->name('resto_edit_save');
Route::get("delete/{id}",[restoController::class,'delete']);

Route::get("user-create",[UserController::class,'create']);
Route::post("user-store",[UserController::class,'store'])->name('user.store');
Route::get("user-list",[UserController::class,'list']);
//Route::get('/delete/{id}','restoController@delete');
//Route::get('/edit/{id}','restoController@edit');

Route::post('/deleteTeacher',[teacherController::class,'deleteTeacher'])->name('delete.teacher');
//Route::get("customer-list",[\App\Http\Controllers\CustomerController::class,'list']);
Route::get("customer-create",[CustomerController::class,'create']);
Route::post("customer-store",[CustomerController::class,'store'])->name('customer.store');
Route::get("customer-list",[CustomerController::class,'List']);
Route::get("customer-editform",[CustomerController::class,'editForm']);
Route::get("customer-edit/{id}",[CustomerController::class,'edit'])->name('customer_edit');


Route::get("ajax",[teacherController::class,'index'])->name('teachers');
Route::post("add-teacher",[teacherController::class,'addTeacher'])->name('add.teacher');
Route::post("update-teacher",[teacherController::class,'updateTeacher'])->name('update.teacher');
Route::post('/deleteTeacher',[teacherController::class,'deleteTeacher'])->name('delete.teacher');
Route::post('/confirmDeleteTeacher',[teacherController::class,'confirmDeleteTeacher'])->name('confirmDelete.teacher');
Route::get('/search-product',[teacherController::class,'searchTeacher'])->name('search.teacher');
//Route::post('/paginationTeacher',[teacherController::class,'paginationTeacher'])->name('pagination.teacher');



//Route::get('/', function (){
//    return view('welcome');
//});

Route::get('/test',[\App\Http\Controllers\TestController::class,'index']);


