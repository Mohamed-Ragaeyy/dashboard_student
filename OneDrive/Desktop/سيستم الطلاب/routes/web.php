<?php

use App\Http\Controllers\Admin\ActivitiesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\SectionsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\ComfortsController;
use App\Http\Controllers\Admin\DisciplinaryController;
use App\Http\Controllers\Admin\QueueController;

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
    return view('admin.index');
})->middleware("auth");

      /**.... admin.... */
Route::get('/register',[App\Http\Controllers\Admin\AdminController::class , 'register'])->name('register');
Route::post('/registerRequest',[App\Http\Controllers\Admin\AdminController::class , 'registerRequest']);
Route::get('/login',[App\Http\Controllers\Admin\AdminController::class ,'login'])->name("login");
Route::post('/loginRequest',[App\Http\Controllers\Admin\AdminController::class , 'loginRequest']);
Route::get('/logout',[App\Http\Controllers\Admin\AdminController::class ,'logout'])->name('logout');

      /**... home... */
Route::get('/index' , [HomeController::class , "index"])->middleware("auth")->name("home");


// Route::get('/finances', function () {
//     return view('finances.index');
// })->middleware("auth");


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    //employee

    Route::get('employees', [EmployeesController::class , 'index'])->name('employee.index');
    Route::get('employees/create',  [EmployeesController::class , 'create'])->name('employee.create');
    Route::post('employees/store',  [EmployeesController::class , 'save'])->name('employee.save');
    Route::get('employees/edit/{id}',  [EmployeesController::class , 'edit'])->name('employee.edit');
    Route::put('employees/update/{id}',  [EmployeesController::class , 'update'])->name('employee.update');
    Route::DELETE('employees/destroy/{id}',  [EmployeesController::class , 'destroy'])->name('employee.destroy');
    Route::post('employees/search', [EmployeesController::class , 'search'])->name('employee.search');


    //comforts

    Route::get('comforts/{id}', [ComfortsController::class , 'index'])->name('comfort.index');
    Route::get('/comfort/create/{id?}',  [ComfortsController::class , 'create'])->name('comfort.create');
    Route::get('comfort/all', [ComfortsController::class , 'all'])->name('comfort.all');
    Route::post('comfort/store',  [ComfortsController::class , 'save'])->name('comfort.save');
    Route::get('comfort/edit/{id}',  [ComfortsController::class , 'edit'])->name('comfort.edit');
    Route::put('comfort/update/{id}',  [ComfortsController::class , 'update'])->name('comfort.update');
    Route::DELETE('comfort/destroy/{id}',  [ComfortsController::class , 'destroy'])->name('comfort.destroy');

    //disciplinarys
    Route::get('disciplinarys/{id}', [DisciplinaryController::class , 'index'])->name('disciplinary.index');
    Route::get('/disciplinary/create/{id?}',  [DisciplinaryController::class , 'create'])->name('disciplinary.create');
    Route::get('disciplinary/all', [DisciplinaryController::class , 'all'])->name('disciplinary.all');
    Route::post('disciplinary/store',  [DisciplinaryController::class , 'save'])->name('disciplinary.save');
    Route::get('disciplinary/edit/{id}',  [DisciplinaryController::class , 'edit'])->name('disciplinary.edit');
    Route::put('disciplinary/update/{id}',  [DisciplinaryController::class , 'update'])->name('disciplinary.update');
    Route::DELETE('disciplinary/destroy/{id}',  [DisciplinaryController::class , 'destroy'])->name('disciplinary.destroy');

    //queues
    Route::get('queues/{id}', [QueueController::class , 'index'])->name('queue.index');
    Route::get('/queue/create/{id?}',  [QueueController::class , 'create'])->name('queue.create');
    Route::get('queue/all', [QueueController::class , 'all'])->name('queue.all');
    Route::post('queue/store',  [QueueController::class , 'save'])->name('queue.save');
    Route::get('queue/edit/{id}',  [QueueController::class , 'edit'])->name('queue.edit');
    Route::put('queue/update/{id}',  [QueueController::class , 'update'])->name('queue.update');
    Route::DELETE('queue/destroy/{id}',  [QueueController::class , 'destroy'])->name('queue.destroy');

});





