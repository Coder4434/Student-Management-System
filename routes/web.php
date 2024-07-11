<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\AdminBilgileri;


Route::get('/','App\Http\Controllers\Auth\LoginController@showLogin')->name('login');
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLogin')->name('login');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@Login');

Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@Logout')->name('logout');




Route::prefix('student')->group(function(){

    Route::get('/', function () {
        return view('student.layouts.front');
    });
    Route::get('Genel-Bilgiler','App\Http\Controllers\OgrenciBilgileri@CommonInfos')->name('Genel-Bilgiler');
    Route::get('Ders-Programı','App\Http\Controllers\OgrenciBilgileri@DersProgramı')->name('Ders-Programı');
    Route::get('not','App\Http\Controllers\OgrenciBilgileri@Not')->name('Not');
    Route::get('sınav-takvimi','App\Http\Controllers\OgrenciBilgileri@SınavTakvimi')->name('sınav-takvimi');
    Route::get('ders-listesi','App\Http\Controllers\OgrenciBilgileri@DersListesi')->name('ders-listesi');
    Route::get('ders-ekle','App\Http\Controllers\OgrenciBilgileri@DersEkle')->name('ders-ekle');
    Route::get('my-route','App\Http\Controllers\OgrenciBilgileri@DersProgramı')->name('my-route');
    Route::post('derslerikaydet','App\Http\Controllers\OgrenciBilgileri@derslerikaydet')->name('dersleri_kaydet');
    Route::get('update','App\Http\Controllers\OgrenciBilgileri@update')->name('update');
    Route::post('updatesifre','App\Http\Controllers\OgrenciBilgileri@updatesifre')->name('updatesifre');
    Route::get('program','App\Http\Controllers\OgrenciBilgileri@program')->name('program');




});







Route::prefix('admin')->group(function() {
    Route::get('/', function() {
        return view('admin.layouts.front');
    });

    Route::match(['get', 'post'], 'secilen-ders', 'App\Http\Controllers\AdminBilgileri@secilenders')->name('secilen-ders');
    Route::post('not-ekle', 'App\Http\Controllers\AdminBilgileri@notekle')->name('not-ekle');

    Route::post('/onayla', 'App\Http\Controllers\AdminBilgileri@onayla')->name('onayla');
    Route::post('/ders-kaydi-baslat', 'App\Http\Controllers\AdminBilgileri@resetDanismanOnay')->name('dersKaydiBaslat');

    Route::get('common-infos', 'App\Http\Controllers\AdminBilgileri@AdminCommonInfos')->name('common-infos');
    Route::get('not-giris', 'App\Http\Controllers\AdminBilgileri@AdminNotGiris')->name('not-giris');

    Route::post('ogrenci-listele', 'App\Http\Controllers\AdminBilgileri@BringStudents')->name('bring-students');
    Route::post('update-students', 'App\Http\Controllers\AdminBilgileri@updateStudents')->name('update-students');
    Route::delete('{id}/delete', 'App\Http\Controllers\AdminBilgileri@deleteStudents')->name('delete-students');

    Route::get('ders-islemleri', 'App\Http\Controllers\AdminBilgileri@AdminDersIslemleri')->name('ders-islemleri');
    Route::post('ders-add', 'App\Http\Controllers\AdminBilgileri@addDers')->name('ders-add');
    Route::delete('ders-delete', 'App\Http\Controllers\AdminBilgileri@deleteDers')->name('ders-delete');

    Route::get('ogrenci-islemleri', 'App\Http\Controllers\AdminBilgileri@AdminOgrenciIslemleri')->name('ogrenci-islemleri');

    Route::get('sinav-takvimi', 'App\Http\Controllers\AdminBilgileri@AdminSinavTakvimi')->name('sinav-takvimi');
    Route::post('sinav-takvimi/add', 'App\Http\Controllers\AdminBilgileri@addSinavTakvimi')->name('sinav-takvimi-add');
    Route::delete('sinav-takvimi/delete/{id}', 'App\Http\Controllers\AdminBilgileri@deleteSinavTakvimi')->name('sinav-takvimi-delete');
    Route::patch('sinav-takvimi/update', 'App\Http\Controllers\AdminBilgileri@updateSinavTakvimi')->name('sinav-takvimi-update');

    Route::get('sifre-degisikligi', 'App\Http\Controllers\AdminBilgileri@AdminSifreDegisikligi')->name('sifre-degisikligi');

    Route::post('updatesifre','App\Http\Controllers\AdminBilgileri@updateAdminSifre')->name('updateAdminSifre');

    Route::get('ders-onay', 'App\Http\Controllers\AdminBilgileri@AdminDersOnay')->name('ders-onay');
});

