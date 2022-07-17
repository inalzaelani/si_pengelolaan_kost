<?php

use App\Models\Occupant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OccupantController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\InvoiceController;
use App\Models\Invoice;

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
    return view('login');
})->name('login');


Route::group(['middleware' => ['auth:user', 'ceklevel:pemilik']], function () {
    Route::get('/exportpdfpenghuni', [OccupantController::class, 'exportpdf'])->name('exportpdfpenghuni');
    Route::get('/exportpdfpembayaran', [PaymentController::class, 'exportpdf'])->name('exportpdfpembayaran');
    Route::get('/exportpdfkeluhan', [ComplaintController::class, 'exportpdf'])->name('exportpdfkeluhan');
});

Route::group(['middleware' => ['auth:user', 'ceklevel:pemilik,pengelola']], function () {
    Route::get('/dashboard', function () {
        $jumlahpenghuni = Occupant::count();
        return view('welcome', compact('jumlahpenghuni'));
    });


    Route::get('/penghuni', [OccupantController::class, 'index'])->name('penghuni');

    Route::get('/details/{id}', [OccupantController::class, 'details'])->name('details');

    Route::get('/tambahpenghuni', [OccupantController::class, 'tambahpenghuni'])->name('tambahpenghuni');
    Route::post('/insertdata', [OccupantController::class, 'insertdata'])->name('insertdata');

    Route::get('/tampilkandata/{id}', [OccupantController::class, 'tampilkandata'])->name('tampilkandata');
    Route::post('/updatedata/{id}', [OccupantController::class, 'updatedata'])->name('updatedata');

    Route::get('/delete/{id}', [OccupantController::class, 'delete'])->name('delete');

    Route::get('/pembayaran', [PaymentController::class, 'index'])->name('pembayaran');

    Route::get('/tampilpembayaran/{id}', [PaymentController::class, 'tampilpembayaran'])->name('tampilpembayaran');
    Route::post('/updatepembayaran/{id}', [PaymentController::class, 'updatepembayaran'])->name('updatepembayaran');

    Route::get('/keluhan', [ComplaintController::class, 'index'])->name('keluhan');

    Route::get('/exportinvoice', [LoginController::class, 'exportpdfinvoice'])->name('exportpdfinvoice');
});

Route::group(['middleware' => ['auth:occupant', 'ceklevel:user']], function () {
    Route::get('/dashboardpenghuni', function () {
        return view('dashboardpenghuni');
    });
    Route::get('/editdatadiri/{id}', [OccupantController::class, 'tampilkandatadiri'])->name('tampilkandatadiri');
    Route::post('/updatedatadiri/{id}', [OccupantController::class, 'updatedatadiri'])->name('updatedatadiri');

    Route::get('/tampilpembayaranpenghuni/{id}', [PaymentController::class, 'tampilpembayaranpenghuni'])->name('tampilpembayaranpenghuni');
    Route::post('/insertpembayaran/{id}', [PaymentController::class, 'insertpembayaran'])->name('insertpembayaran');

    Route::get('/invoice/{id}', [InvoiceController::class, 'index'])->name('index');
    Route::get('/exportpdfinvoice/{id}', [InvoiceController::class, 'exportpdf'])->name('exportinvoice');

    Route::get('/tampilkeluhan/{id}', [ComplaintController::class, 'tampilkeluhan'])->name('tampilkeluhan');
    Route::post('/insertkeluhan/{id}', [ComplaintController::class, 'insertkeluhan'])->name('insertkeluhan');
});

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/postlogout', [LoginController::class, 'postlogout'])->name('postlogout');
