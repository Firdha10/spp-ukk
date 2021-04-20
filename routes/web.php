<?php

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

Route::get('/', 'AdminController@login')->name('login');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::resource('siswa', 'SiswaController');
    Route::resource('user', 'AdminController');
    Route::resource('petugas', 'PetugasController');
    Route::resource('spp', 'SppController');
    Route::resource('pembayaran', 'PembayaranController');
    Route::resource('history-pembayaran', 'HistoryPembayaranController');
    Route::resource('kelas', 'KelasController');
    Route::resource('jurusan', 'JurusanController');
    Route::get('profil/{id}', 'AdminController@profil')->name('profil.user');
    Route::put('profil/{id}/update', 'AdminController@updateProfil')->name('admin.update.profil');
    Route::get('/laporan', 'LaporanController@index')->name('laporan');
    Route::get('/laporan/create', 'LaporanController@create');
    Route::get('edit/pass/{id}', 'AdminController@ubahPass')->name('pass');
    Route::put('pass/{id}', 'AdminController@updatePass')->name('update.pass');
});
Auth::routes();
