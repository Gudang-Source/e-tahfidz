<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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



Route::group(["namespace" => "auth", 'middleware' => "guest"],function() {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    Route::get('/login', 'authController@getLogin')->name('login');
    Route::post('/login', 'authController@postLogin');
    Route::get('/register', 'authController@getRegister')->name('register');
    Route::post('/register', 'authController@postRegister');
});

Route::group(['namespace' => "suAdmin", "prefix" => "super-admin", 'middleware' => "auth"],function() {
    Route::get('', 'suAdminController@index')->name('suAdmin.index');
    Route::post('/pengumuman', 'suAdminController@info')->name('suAdmin.info.store');
    Route::get('/tambah-pengajar', 'suAdminController@pengajarGet')->name('suAdmin.pengajar.get');
    Route::post('/tambah-pengajar', 'suAdminController@pengajarPost');
    Route::delete('/hapus-pengajar/{pjr}', 'suAdminController@pengajarDestroy')->name('suAdmin.pengajar.destroy');
    Route::get('/edit-data-pengajar/{pjr}', 'suAdminController@pengajarEdit')->name('suAdmin.pengajar.edit');
    Route::put('/edit-data-pengajar/{pjr}', 'suAdminController@pengajarUpdate');
    Route::put('/ganti-password-pengajar/{pjr}','suAdminController@editPassword')->name('suAdmin.edit.password');
    Route::get('/kelas', 'suAdminController@kelasGet')->name('suAdmin.kelas.get');
    Route::post('/kelas', 'suAdminController@kelasPost');
    Route::delete('/hapus-kelas/{class}', 'suAdminController@kelasDestroy')->name('suAdmin.kelas.destroy');
    Route::get('/kelas-edit/{class}', 'suAdminController@kelasEdit')->name('suAdmin.kelas.edit');
    Route::put('/kelas-edit/{class}', 'suAdminController@kelasUpdate');
    Route::get('/kelas/tambah-murid', 'suAdminController@tambahMurid')->name('suAdmin.tambah.murid');
    Route::get('/registrasi-pending', 'suAdminController@pendingGet')->name('suAdmin.pending.get');
    Route::post('/registrasi-pending/{pending}', 'suAdminController@emailNotif')->name('suAdmin.confir');
    Route::delete('/hapus-murid/{murid}', 'suAdminController@muridDestroy')->name('suAdmin.murid.destroy');
    Route::get('/murid', 'suAdminController@muridGet')->name('suAdmin.murid.get');

    Route::get('/logout', function() {
        Alert::success('Berhasil', 'Kamu Berhasil Logout');
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
});
