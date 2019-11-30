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
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes(['verify' => true]);

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');

Route::post('/NotifyEmail', 'MailNotifyBorrowed@NotifyBorrowed')->name('NotifyEmail')->middleware(['auth']);

Route::resource('user_barang', 'barang')->middleware(['auth']);
Route::resource('user_barang_borrowing', 'userBarangIsNotReturned')->middleware(['auth']);
Route::resource('user_barang_returned', 'userBarangHasReturned')->middleware(['auth']);
Route::resource('user_barang_fresh', 'userBarangIsFresh')->middleware(['auth']);
Route::resource('user_peminjaman', 'peminjaman')->middleware(['auth']);
Route::resource('user_pengembalian', 'pengembalian')->middleware(['auth']);
Route::resource('user_pengajuan', 'pengajuan')->middleware(['auth']);
Route::resource('user_masihMeminjam', 'userMeminjam')->middleware(['auth']);
Route::resource('user_sudahKembali', 'userKembalikan')->middleware(['auth']);
Route::resource('admin_barang', 'adminBarang')->middleware(['auth']);
Route::resource('admin_peminjaman', 'adminPeminjaman')->middleware(['auth']);
Route::resource('admin_pengembalian', 'adminPengembalian')->middleware(['auth']);

Route::resource('historyLend', 'historyLend')->middleware(['auth']);
Route::resource('historyBorrow', 'historyBorrow')->middleware(['auth']);;

Route::resource('user_barang_lending', 'userBarangLending')->middleware(['auth']);
Route::resource('admin_category', 'categoryController');

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth']);

Route::get('/search','search@engine')->name('search');
