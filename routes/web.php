<?php

use App\Http\Controllers\JobPortalController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
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

//  route to display all jobs from the database 
Route::get('/', [JobPortalController::class, 'index']);

// Route for more information about jobs
Route::get('/jobs/{id}/{job}', [JobPortalController::class, 'show'])->name('jobs.show');

// showing more about the company
Route::get('/company/{id}/{company}', [CompanyController::class, 'index'])->name('company.index');

// user profile 
Route::get('user/profile', [UserProfileController::class, 'index']);

//storing user profile information
Route::post('user/profile/create', [UserProfileController::class, 'store'])->name('profile.create');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
