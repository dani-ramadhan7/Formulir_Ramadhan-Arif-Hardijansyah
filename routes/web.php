<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\FormController;

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
});

Route::get('/pegawai', function () {
    return view('welcome-pegawai');
});

Route::view("/pegawai", "welcome-pegawai");

Route::redirect("/employee", "/pegawai");

// Route::get("/pegawai/{id}", function ($id) {
//     return "Pegawai dengan id: " . $id . ".";
// })->where('id', '[0-9]+');

// Route::get("/pegawai/{id}", function ($id) {
//     return "Pegawai dengan id: " . $id . ".";
// })->whereNumber('id');

// Route::get("/pegawai/{id}/city/{city}", function ($id, $city) {
//     return "Pegawai dengan id: " . $id . ", dengan kota: " . $city . ".";
// })->where(['id' => '[0-9]+', 'city' => '[a-z]+']);

// Route::get("/pegawai/{id}/city/{city}", function ($id, $city) {
//     return "Pegawai dengan id: " . $id . ", dengan kota: " . $city . ".";
// })->whereNumber('id')->whereAlpha('city');

Route::middleware('date')->prefix("/pegawai")->group(function () {
    Route::get("/view", function () {
        return "Pegawai Laravel.";
    });
    Route::get("/{id}", function ($id) {
        return "Pegawai dengan id: " . $id . ".";
    })->whereNumber('id');
});

Route::get("/view", function () {
    return "Warga Laravel.";
})->name("view");

Route::get('/dosen', [DosenController::class, 'index']);


Route::get('/formulir', [GuestController::class, 'input'])->name('input-form-guest');
Route::post('/proses-form/{id}', [GuestController::class, 'proses'])->name('proses-form-guest');


Route::get('/input', [FormController::class, 'input']);
Route::post('/proses', [FormController::class, 'proses']);