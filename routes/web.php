<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('Form.BuyAndWinView');
});

Route::get('/test', function () {
    return view('Mail.ThankYouView');
});

Route::get('/test23', function () {
    return view('test');
});



Route::get('/thank-you', function () {
    return view('Form.ThankYouView');
})->name('thank-you');

Route::get('upload-codes',
function ()
{
    return view('Form.CodeUploadView');
});


Route::resources(
    [
        'entry' => \App\Http\Controllers\PromoEntryController::class,
        'code' => \App\Http\Controllers\PromoCodeController::class,

    ]
);
