<?php

use App\Models\Enquiry;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquiryController;

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
})->name('landing');

Route::middleware(['web'])
    ->group(function () {
        Route::resources([
            'enquiries' => EnquiryController::class,
        ]);
    });


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $enquiries = Enquiry::all();
    return view('dashboard', compact('enquiries'));
})->name('dashboard');
