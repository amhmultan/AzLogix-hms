<?php

use App\Http\Controllers\Admin\PatientController;
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

//Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/doctor', function () {
    return view('doctor');
});

Route::get('/doctor-single', function () {
    return view('doctor-single');
});

Route::get('/department-single', function () {
    return view('department-single');
});

Route::get('/department', function () {
    return view('department');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/confirmation', function () {
    return view('confirmation');
});

Route::get('/blog-single', function () {
    return view('blog-single');
});

Route::get('/blog-sidebar', function () {
    return view('blog-sidebar');
});

Route::get('/appointment', function () {
    return view('appointment');
});

// Front auth routes
Route::get('/dashboard', function () {
    return view('front.dashboard');
})->middleware(['front'])->name('dashboard');


require __DIR__.'/front_auth.php';


// Admin routes
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('admin.dashboard');

require __DIR__.'/auth.php';

Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')
    ->group(function(){
        Route::resource('roles','RoleController');
        Route::resource('permissions','PermissionController');
        Route::resource('users','UserController');
        Route::resource('hospitals','HospitalController');
        Route::resource('posts','PostController');
        Route::resource('patients','PatientController');
        Route::resource('tokens','TokenController');
        Route::resource('manufacturers','ManufacturerController');
        Route::resource('suppliers','SupplierController');
        Route::resource('tokens','TokenController');
        Route::resource('products','ProductController');
        Route::resource('p_lab','PLabController');
        Route::resource('doctor_notes','DoctorNotesController');
});