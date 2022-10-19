<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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
// GET
Route::get('/', function () {
    return view('welcome');
});
Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');
Route::get('/tambahPegawai', [EmployeeController::class, 'tambahPegawai'])->name('tambahPegawai');
Route::get('/tampilDataPegawai/{id}', [EmployeeController::class, 'tampilDataPegawai'])->name('tampilDataPegawai');
//POST DATA PEGAWAI
Route::post('/tambahDataPegawai', [EmployeeController::class, 'tambahDataPegawai'])->name('tambahDataPegawai');
//Update Data Pegawai
Route::post('/updateDataPegawai/{id}', [EmployeeController::class, 'updateDataPegawai'])->name('updateDataPegawai');
// Delete Data Pegawai
Route::get('/deleteDataPegawai/{id}', [EmployeeController::class, 'deleteDataPegawai'])->name('deleteDataPegawai');

