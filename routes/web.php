<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MateriKelasController;

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
    return view('auth.login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', fn() => view('home', ["title" => "admin"]))->name('admin_dashboard');
    Route::resource('jurusan', JurusanController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('siswa', SiswaController::class);
});

Route::group(['prefix' => 'guru', 'middleware' => 'auth'], function () {
    Route::get('/', fn() => view('home', ["title" => "guru"]))->name('guru_dashboard');
    Route::resource('materi', MateriController::class);
    // Route::resource('tugas', TugasController::class);
});

Route::group(['prefix' => 'siswa', 'middleware' => 'auth'], function () {
    Route::get('/', fn() => view('home', ["title" => "siswa"]))->name('siswa_dashboard');
    Route::resource('materi-kelas', MateriController::class);
    // Route::resource('tugas-kelas', TugasController::class);
});


Auth::routes([
    'register' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
