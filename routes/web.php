<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', 'Auth\LoginController@adminLogin')->name('adminLogin');


// ROUTE FOR ADMIN ONLY
Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin', 'active', 'check.session'])->group(function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('profile', 'AdminController@profile')->name('profile');
    Route::put('updateProfile', 'AdminController@updateProfile')->name('updateProfile');

    /* Master Data */

    // Kelurahan
    Route::resource('kelurahan', 'KelurahanController');

    // Biodata Terpidana WNI
    Route::resource('wni', 'BiodataWNIController');

    // Biodata Terpidana WNA
    Route::resource('wna', 'BiodataWNAController');

    /* Reference Data */

    // Kecamatan
    Route::resource('kecamatan', 'KecamatanController');

    // Agama
    Route::resource('agama', 'AgamaController');

    // Warga Negara
    Route::resource('warga-negara', 'WargaNegaraController');

    // Pendidikan
    Route::resource('pendidikan', 'PendidikanController');

    // Status Perkawinan
    Route::resource('status-perkawinan', 'StatusPerkawinanController');

    // Legalitas Perkawinan
    Route::resource('legalitas-perkawinan', 'LegalitasPerkawinanController');

    // Pekerjaan
    Route::resource('pekerjaan', 'PekerjaanController');

    // Suku Bangsa
    Route::resource('suku-bangsa', 'SukuBangsaController');

    // Negara
    Route::resource('negara', 'NegaraController');

    // Tinggal Sementara WNA
    Route::resource('tinggal-sementara', 'TinggalSementaraWNAController');

    // Kunjungan WNA
    Route::resource('kunjungan', 'KunjunganWNAController');
});
