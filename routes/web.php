<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
Auth::routes();

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



Route::get('/allApplications/{id}', [ApplicationController::class, 'allApplications'])->name('allApplications');
Route::get('/myApplications', [ApplicationController::class, 'myApplications']);
Route::post('/storeApplication', [ApplicationController::class, 'store']);
Route::post('/updateApplicationStatus', [ApplicationController::class, 'updateStatus'])->name('allApplications.updateStatus');
Route::post('/allApplications/{id}/approve', [ApplicationController::class, 'approveStatus'])->name('allApplications.approveStatus');
Route::post('/allApplications/{id}/reject', [ApplicationController::class, 'rejectStatus'])->name('allApplications.rejectStatus');
Route::post('/frontPage', [ApplicationController::class, 'rejectStatus'])->name('allApplications.rejectStatus');
Route::get('/resume/{application}', [App\Http\Controllers\ApplicationController::class, 'viewResume'])->name('applications.viewResume');

Route::post('/storeCompany', [CompanyController::class, 'store'])->name('storeCompany');
Route::get('/editCompany/{id}', [CompanyController::class, 'edit']);
Route::post('/updateCompany/{id}', [CompanyController::class, 'update']);
Route::get('/compProfile/{id}', [CompanyController::class, 'show']);






Route::middleware(['auth'])->group(function () {
    Route::get('/index', [ListingController::class, 'index'])->name('index');

    Route::get('/addJob', [ListingController::class, 'create'])->name("addJob");
    Route::post('/storeJob', [ListingController::class, 'store']);
    Route::get('/editJob/{id}', [ListingController::class, 'edit']);
    Route::post('/updateJob/{id}', [ListingController::class, 'update']);
    Route::get('/deleteJob/{id}', [ListingController::class, 'delete']);
    Route::get('/applyNow/{listingId}', [ApplicationController::class, 'create']);
    Route::get('/showJob/{id}', [ListingController::class, 'show'])->name('showJob');


    Route::get('/addCompany', [CompanyController::class, 'create'])->name('addCompany');

    
    

});
Route::get('/manageJob', [ListingController::class, 'manage']);




// Route::get('/showJob/{id}', [ListingController::class, 'show']);
Route::get('/frontPage', function () {
    return view('pages.frontPage');
})->name('frontPage');


// Route::get('/allApplications', function () {
//     return view('pages.allApplications');
// });




