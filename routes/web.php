<?php

use App\Http\Controllers\AdminUmkmController;
use App\Http\Controllers\AparaturController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfilDesaController;
use App\Models\Aparatur;
use App\Models\Pengaduan;
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

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login-proses',[LoginController::class, 'login_proses'])->name('login-proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::post('/register-proses',[LoginController::class, 'register_proses'])->name('register-proses');

Route::get('/',[HomeController::class, 'homepage']);
Route::get('/homepage', [HomeController::class, 'homepage'])->name('homepage');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin'], 'as' => 'admin.'], function(){
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // Route::get('/',[HomeController::class, 'homepage']);
    // Route::get('/homepage', [HomeController::class, 'homepage'])->name('homepage');



    Route::get('/user',[HomeController::class, 'user'])->name('user');

    Route::get('/aparatur',[AparaturController::class, 'aparatur'])->name('aparatur');
    Route::get('/create',[AparaturController::class, 'create'])->name('create');
    Route::post('/store2',[AparaturController::class, 'store2'])->name('store2');
    Route::get('/edit/{id}',[AparaturController::class, 'edit'])->name('aparatur.edit');
    Route::put('/update/{id}',[AparaturController::class, 'update'])->name('aparatur.update');
    Route::delete('/delete/{id}',[AparaturController::class, 'delete'])->name('aparatur.delete');

   
    Route::get('/pengaduan', [PengaduanController::class, 'pengaduan'])->name('pengaduan');
    //Route::get('/create_pengaduan',[PengaduanController::class, 'create_pengaduan'])->name('create_pengaduan');
    Route::post('/simpan_pengaduan',[PengaduanController::class, 'simpan_pengaduan'])->name('simpan_pengaduan');
    Route::get('/edit_pengaduan/{id}',[PengaduanController::class, 'edit_pengaduan'])->name('Pengaduan.edit');
    Route::put('/update_pengaduan/{id}',[PengaduanController::class, 'update_pengaduan'])->name('Pengaduan.update');
    Route::delete('/delete_pengaduan/{id}',[PengaduanController::class, 'delete_pengaduan'])->name('Pengaduan.delete');

    Route::get('/profildesa', [ProfilDesaController::class, 'profildesa'])->name('profildesa');
    Route::get('/create_profildesa',[ProfilDesaController::class, 'create_profildesa'])->name('create_profildesa');
    Route::post('/simpan_profildesa',[ProfilDesaController::class, 'simpan_profildesa'])->name('simpan_profildesa');
    Route::get('/edit_profildesa/{id}',[ProfilDesaController::class, 'edit_profildesa'])->name('profildesa.edit');
    Route::put('/update_profildesa/{id}',[ProfilDesaController::class, 'update_profildesa'])->name('profildesa.update');
    Route::delete('/delete_profildesa/{id}',[ProfilDesaController::class, 'delete_profildesa'])->name('profildesa.delete');



});

// Route::get('/H_pengaduan', function () {
//     return view('H_pengaduan');
// })->name('H_pengaduan');
Route::get('/pengaduan', [PengaduanController::class, 'pengaduan'])->name('pengaduan');
Route::get('/H_pengaduan',[PengaduanController::class, 'H_pengaduan'])->name('H_pengaduan');
Route::post('/simpan_pengaduan',[PengaduanController::class, 'simpan_pengaduan'])->name('simpan_pengaduan');
Route::delete('/delete_pengaduan/{id}', [PengaduanController::class, 'delete_pengaduan'])->name('delete_pengaduan');



Route::get('/homepage', function () { 
    return view('homepage');
});
Route::get('/sejarah', function () {
    return view('sejarah');
});
Route::get('/sejarah', function () {
    return view('sejarah');
});
Route::get('/visi-misi', function () {
    return view('visi-misi');
});
Route::get('/Beritaklik', function () {
    return view('Beritaklik');
});
// Route::get('/login', function () {
//     return view('auth.login');
// });
// Route::get('/Daftar', function () {
//     return view('Daftar');
// });
Route::get('/H_aparatur', function () {
    return view('H_aparatur');
});
// Route::get('/H_pengaduan', function () {
//     return view('H_pengaduan');
// });
Route::get('/H_surat', function () {
    return view('H_surat');
});
Route::get('/UMKM-D', function () {
    return view('UMKM-D');
});
Route::get('/UMKM-e', function () {
    return view('UMKM-e');
});
Route::get('/UMKM-c', function () {
    return view('UMKM-c');
});
Route::get('/UMKM-k', function () {
    return view('UMKM-k');
});
Route::get('/berita', function () {
    return view('berita');
});


Route::group(['prefix' => 'umkm', 'middleware' => ['auth', 'role:umkm'], 'as' => 'umkm.'], function(){
    Route::get('/dashboard_umkm', [AdminUmkmController::class, 'dashboard_umkm'])->name('dashboard_umkm');
    


});

Route::group(['middleware' => ['auth', 'role:customer']], function() {
    Route::get('/homepage', [HomeController::class, 'homepage'])->name('homepage');
    // Tambahkan rute customer lainnya di sini
});