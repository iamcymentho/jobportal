<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobPortalController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\EmployerProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;



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

// --------------------------------
// USER EMAIL VERIFICATION  ROUTES
// -------------------------------




// Auth::routes();



Auth::routes();

Route::get('/home', [HomeController::class, 'create'])->name('home');

// -----------------------------
// JOB LISTING ROUTES
// ----------------------------

//  route to display all jobs from the database on the homepage

Route::get('/', [JobPortalController::class, 'index']);

// Route for more information about jobs
Route::get('/jobs/{id}/{job}', [JobPortalController::class, 'show'])->name('jobs.show');

// show job posting form 
Route::get('/jobs/create', [JobPortalController::class, 'create'])->name('jobs.create');

// route for job posting /blogging
Route::post('/jobs/create', [JobPortalController::class, 'store'])->name('jobs.store');

// // route for editing  posted jobs
Route::get('/jobs/{id}/edit', [JobPortalController::class, 'edit'])->name('job.edit');



// show editing posted jobs
Route::get('/jobs/my-job', [JobPortalController::class, 'myjob'])->name('my.job');

// job seeker applying for job 
Route::post('/applications/{id}', [JobPortalController::class, 'apply'])->name('applications');

// employer viewing all appilcant
Route::get('/jobs/applications', [JobPortalController::class, 'applicant'])->name('applicants');

// routes for all jobs
Route::get('/jobs/alljobs', [JobPortalController::class, 'allJobs'])->name('alljobs');

//save job for future purposes
Route::post('/savejob/{id}', [FavoriteController::class, 'savejob']);

//unsave job for future purposes
Route::post('/unsave/{id}', [FavoriteController::class, 'unsavejob']);



//show EDIT form 

Route::get('/jobs/{id}/edit', [JobPortalController::class, 'edit'])->name('editjob');










// -----------------------------
//  COMPANY ROUTES
//  ----------------------------

// showing more about the company
Route::get('/company/{id}/{company}', [CompanyController::class, 'index'])->name('company.index');

// storing company profile information
Route::get('/company/create', [CompanyController::class, 'create'])->name('company.view');

Route::post('/company/create', [CompanyController::class, 'store'])->name('company.store');

// updating company cover photo
Route::post('company/coverphoto', [CompanyController::class, 'coverPhoto'])->name('cover.photo');

// updating company logo
Route::post('company/logo', [CompanyController::class, 'companyLogo'])->name('company.logo');



// -----------------------------
//  USER PROFILE ROUTES
//  ----------------------------


// user profile 
Route::get('user/profile', [UserProfileController::class, 'index']);

//storing user profile information
Route::post('user/profile/create', [UserProfileController::class, 'store'])->name('profile.create');

//storing user cover letter
Route::post('user/coverletter', [UserProfileController::class, 'storecoverletter'])->name('cover.letter');

//storing user resume
Route::post('user/resume', [UserProfileController::class, 'storeresume'])->name('user.resume');

// uploading profile picture
Route::post('user/avatar', [UserProfileController::class, 'storeprofilepicture'])->name('avatar');



// -----------------------------
//  EMPLOYER ROUTES
//  ----------------------------


// employer view
Route::view('employer/register', 'auth.employer-register')->name('employer.register');

// employer registration
Route::post('employer/register', [EmployerProfileController::class, 'employerregistration'])->name('emp.register');



// -----------------------------
//  CATEGORY LISTING ROUTES
//  ----------------------------

Route::get('/category/{id}', [CategoryController::class, 'index'])->name('category.index');


// -----------------------------
//  LISTING ALL COMPANIES ROUTES
//  ----------------------------

Route::get('/companies', [CompanyController::class, 'company'])->name('company');


// -----------------------------
//  MAIL A FRIEND ROUTES
//  ----------------------------

Route::post('/job/mail', [EmailController::class, 'send'])->name('mail');


// -----------------------------
//  ADMIN ROUTES
//  ----------------------------

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');

Route::get('/dashboard/create', [DashboardController::class, 'create'])->middleware('admin');

Route::post('/dashboard/create', [DashboardController::class, 'store'])->name('post.store')->middleware('admin');

Route::post('/dashboard/destroy', [DashboardController::class, 'destroy'])->name('post.delete')->middleware('admin');

Route::get('/dashboard/{id}/edit', [DashboardController::class, 'edit'])->name('post.edit')->middleware('admin');

Route::post('/dashboard/{id}/update', [DashboardController::class, 'update'])->name('post.update')->middleware('admin');

Route::get('/dashboard/trash', [DashboardController::class, 'trash'])->middleware('admin');

Route::get('/dashboard/{id}/restore', [DashboardController::class, 'restore'])->name('post.restore')->middleware('admin');

Route::get('/dashboard/{id}/toggle', [DashboardController::class, 'toggle'])->name('post.toggle')->middleware('admin');

// show more of the blog post
Route::get('/posts/{id}/slug', [DashboardController::class, 'show'])->name('post.show');
