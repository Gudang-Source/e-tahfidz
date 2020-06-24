<!--
|--------------------------------------------------------------------------
| Author ====> Muhammad Al Farizzi
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
| Github ====> AlFrz27
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
| Facebook ====> AlFarizzi
|--------------------------------------------------------------------------
 -->
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\information;

Route::get('/', 'welcomeController@index')->name('welcome')->middleware('guest');
Route::group(["namespace" => "auth", 'middleware' => "guest"],function() {
    Route::group(['prefix' => "login"],function() {
        Route::get('', 'authController@getLogin')->name('login');
        Route::post('', 'authController@postLogin');
    });
    Route::group(['prefix' => 'registrasi'],function() {
        Route::get('', 'authController@getRegister')->name('register');
        Route::post('', 'authController@postRegister');
    });
});

Route::group(['namespace' => "suAdmin", "prefix" => "super-admin", 'middleware' => "auth"],function() {
    Route::get('', 'suAdminController@index')->name('suAdmin.index');
    Route::group(['prefix' => "feature"],function() {
        Route::get('', 'featureController@fiturGet')->name('suAdmin.fitur');
        Route::post('', 'featureController@fiturPost');
        Route::get('/iklan', 'featureController@iklanGet')->name('suAdmin.fitur.iklan');
        Route::post('/iklan', 'featureController@iklanPost');
        Route::post('/iklan-gambar', 'featureController@iklanGambar')->name('suAdmin.fitur.iklan.gambar');
        Route::get('/spp', 'featureController@sppGet')->name('suAdmin.fitur.spp');
        Route::get('/bayar-spp/{murid}', 'featureController@sppBayar')->name('suAdmin.bayar');
        Route::put('/bayar-spp/{murid}', 'featureController@sppBayar2')->name('suAdmin.bayar.confir');
    });
    Route::group(['prefix' => 'search'],function() {
        Route::get('/murid', 'searchController@murid')->name('murid.search');
        Route::get('/pengajar', 'searchController@pengajar')->name('pengajar.search');
        Route::get('/kelas', 'searchController@kelas')->name('kelas.search');
        Route::get('/spp', 'searchController@spp')->name('spp.search');
    });
        
    Route::group(['prefix' => 'informasi'],function() {
        Route::post('', 'infoController@info')->name('suAdmin.info.store');
        Route::delete('/hapus-informasi/{inf}', 'infoController@infoDestroy')->name('suAdmin.info.destroy');
        Route::get('/edit-informasi/{inf}', 'infoController@infoEdit')->name('suAdmin.info.edit');
        Route::put('/edit-informasi/{inf}', 'infoController@infoUpdate');
    });
   
    Route::group(['prefix' => "pembimbing"],function(){
        Route::get('', 'pengajarController@pengajarGet')->name('suAdmin.pengajar.get');
        Route::post('', 'pengajarController@pengajarPost');
        Route::delete('/hapus-pembimbing/{pjr}', 'pengajarController@pengajarDestroy')->name('suAdmin.pengajar.destroy');
        Route::get('/edit-data-pembimbing/{pjr}', 'pengajarController@pengajarEdit')->name('suAdmin.pengajar.edit');
        Route::put('/edit-data-pembimbing/{pjr}', 'pengajarController@pengajarUpdate');
        Route::put('/ganti-password-pembimbing/{pjr}','pengajarController@editPassword')->name('suAdmin.edit.password');
    });

    Route::group(['prefix' => 'kelas'],function(){
        Route::get('', 'kelasController@kelasGet')->name('suAdmin.kelas.get');
        Route::post('', 'kelasController@kelasPost');
        Route::delete('/hapus-kelas/{class}', 'kelasController@kelasDestroy')->name('suAdmin.kelas.destroy');
        Route::get('/kelas-edit/{class}', 'kelasController@kelasEdit')->name('suAdmin.kelas.edit');
        Route::put('/kelas-edit/{class}', 'kelasController@kelasUpdate');
        Route::get('/kelas/tambah-murid/{class}', 'kelasController@tambahMurid')->name('suAdmin.tambah.murid');
        Route::post('/kelas/tambah-murid/{class}', 'kelasController@tambahMurid2');
        Route::delete('/kelas/hapus-murid/{murid}', 'kelasController@dropMurid')->name('suAdmin.kelas.drop');
    });

    Route::group(['prefix' => "registrasi-pending"],function(){
        Route::get('', 'suAdminController@pendingGet')->name('suAdmin.pending.get');
        Route::post('/{pending}', 'suAdminController@emailNotif')->name('suAdmin.confir');
    });
    
    Route::group(['prefix' => "murid"],function(){
        Route::get('', 'suAdminController@muridGet')->name('suAdmin.murid.get');
        Route::get('/catatan/{murid}', 'suAdminController@noteGet')->name('suAdmin.siswa.note');
        Route::post('/catatan/{murid}', 'suAdminController@notePost');
        Route::delete('/hapus-murid/{murid}', 'suAdminController@muridDestroy')->name('suAdmin.murid.destroy');
        Route::get('/edit-data-murid/{murid}', 'suAdminController@muridEdit')->name('suAdmin.murid.edit');
        Route::put('/edit-data-murid/{murid}', 'suAdminController@muridUpdate');
        Route::put('/edit-password/{murid}', 'suAdminController@muridEditPw')->name('suAdmin.murid.edit.password');
    });

    Route::get('/logout', function() {
        Alert::success('Berhasil', 'Kamu Berhasil Logout');
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

});

Route::group(['namespace' => "murid", 'prefix' => "murid", "middleware" => "auth"],function() {
    Route::get('',  'muridController@index')->name('murid.index'); 
    Route::get('/notes', 'muridController@note')->name('murid.notes');   
    Route::get('/kelas', 'muridController@class')->name('murid.class');
});

Route::group(['namespace' => "guru", "prefix" => "guru", "middleware" => "auth"],function(){
    Route::get('', 'guruController@index')->name('guru.index');
    Route::get('/kelas', 'guruController@kelasGet')->name('guru.kelas');
});
