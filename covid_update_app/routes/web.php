<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CovidCasesController;
use App\Http\Controllers\UserViewController;


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

Route::middleware(['auth'])->group(function () {
    Route::get('/contacts', [CovidCasesController::class, 'contacts'])->name('contacts');

    Route::post('/post', [CovidCasesController::class, 'store'])->name('storeCases');

    Route::get('/admin', [CovidCasesController::class, 'index'])->name('adminHome');

    Route::get('/delete/{id}', [CovidCasesController::class, 'deleteContact'])->name('deleteContact');

    Route::get('/update/{id}', [CovidCasesController::class, 'updateContact'])->name('updateContact');

    Route::post('/update', [CovidCasesController::class, 'update'])->name('update');

    Route::get('/links', [CovidCasesController::class, 'links'])->name('links');


    Route::post('/updatecases', [CovidCasesController::class, 'updateCases'])->name('updateCases');



    Route::get('/deleteLink/{id}', [CovidCasesController::class, 'deleteLink'])->name('deleteLink');

    Route::get('/updateLink/{id}', [CovidCasesController::class, 'updateLink'])->name('updateLink');

    Route::post('/updateLink', [CovidCasesController::class, 'updateLink'])->name('updateLink');
});

// User Interface

Route::get('/', [UserViewController::class, 'index'])->name('userView');



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
