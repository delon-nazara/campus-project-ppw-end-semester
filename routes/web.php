<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;

Route::get('/', [ViewController::class, 'login'])->name('login');
Route::post('/', [ViewController::class, 'loginValidation']);
Route::get('/beranda', [ViewController::class, 'beranda'])->middleware('auth');
Route::get('/mahasiswa', [ViewController::class, 'mahasiswa'])->middleware('auth');
Route::get('/mahasiswa/{mahasiswa:nim}', [ViewController::class, 'profilMahasiswa'])->middleware('auth');
Route::get('/fakultas', [ViewController::class, 'fakultas'])->middleware('auth');
Route::get('/jurusan', [ViewController::class, 'jurusan'])->middleware('auth');
Route::get('/mata-kuliah', [ViewController::class, 'mataKuliah'])->middleware('auth');
Route::post('/logout', [ViewController::class, 'logout']);
Route::get('/kelola-data', [ViewController::class, 'kelolaData'])->middleware('auth');

Route::get('/kelola-data/mahasiswa', [MahasiswaController::class, 'kelolaDataMahasiswa'])->middleware('auth');
Route::get('/kelola-data/mahasiswa/tambah', [MahasiswaController::class, 'tambahDataMahasiswa'])->middleware('auth');
Route::post('/kelola-data/mahasiswa/tambahPost', [MahasiswaController::class, 'tambahDataMahasiswaPost'])->middleware('auth');
Route::get('/kelola-data/mahasiswa/edit/{mahasiswa:nim}', [MahasiswaController::class, 'editDataMahasiswa'])->middleware('auth');
Route::post('/kelola-data/mahasiswa/edit', [MahasiswaController::class, 'editDataMahasiswaPost'])->middleware('auth');
Route::get('/kelola-data/mahasiswa/hapus/{mahasiswa:nim}', [MahasiswaController::class, 'hapusDataMahasiswa'])->middleware('auth');

Route::get('/kelola-data/mata-kuliah', [MataKuliahController::class, 'kelolaDataMataKuliah'])->middleware('auth');
Route::get('/kelola-data/mata-kuliah/edit/{mataKuliah:nama}', [MataKuliahController::class, 'editDataMataKuliah'])->middleware('auth');
Route::post('/kelola-data/mata-kuliah/edit', [MataKuliahController::class, 'editDataMataKuliahPost'])->middleware('auth');
Route::get('/kelola-data/mata-kuliah/hapus/{mataKuliah}', [MataKuliahController::class, 'hapusDataMataKuliah'])->middleware('auth');
