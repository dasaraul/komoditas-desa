<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KomoditiController;
use App\Http\Controllers\KomoditasDesaController;
 
Route::get('/', function () {
    return view('auth.login');
});
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\KomoditasDesaController::class, 'dashboard'])->name('dashboard');
 
    Route::controller(KategoriController::class)->prefix('kategoris')->group(function () {
        Route::get('', 'index')->name('kategoris');
        Route::get('create', 'create')->name('kategoris.create');
        Route::post('store', 'store')->name('kategoris.store');
        Route::get('show/{id}', 'show')->name('kategoris.show');
        Route::get('edit/{id}', 'edit')->name('kategoris.edit');
        Route::put('edit/{id}', 'update')->name('kategoris.update');
        Route::delete('destroy/{id}', 'destroy')->name('kategoris.destroy');
    });

    Route::controller(DesaController::class)->prefix('desas')->group(function () {
        Route::get('', 'index')->name('desas');
        Route::get('create', 'create')->name('desas.create');
        Route::post('store', 'store')->name('desas.store');
        Route::get('show/{id}', 'show')->name('desas.show');
        Route::get('edit/{id}', 'edit')->name('desas.edit');
        Route::put('edit/{id}', 'update')->name('desas.update');
        Route::delete('destroy/{id}', 'destroy')->name('desas.destroy');
    });

    Route::controller(KomoditiController::class)->prefix('komoditis')->group(function () {
        Route::get('', 'index')->name('komoditis');
        Route::get('create', 'create')->name('komoditis.create');
        Route::post('store', 'store')->name('komoditis.store');
        Route::get('show/{id}', 'show')->name('komoditis.show');
        Route::get('edit/{id}', 'edit')->name('komoditis.edit');
        Route::put('edit/{id}', 'update')->name('komoditis.update');
        Route::delete('destroy/{id}', 'destroy')->name('komoditis.destroy');
    });

    Route::controller(KomoditasDesaController::class)->prefix('komoditas_desa')->group(function () {
        Route::get('', 'index')->name('komoditas_desa');
        Route::get('create', 'create')->name('komoditas_desa.create');
        Route::post('store', 'store')->name('komoditas_desa.store');
        Route::get('show/{id}', 'show')->name('komoditas_desa.show');
        Route::get('edit/{id}', 'edit')->name('komoditas_desa.edit');
        Route::put('edit/{id}', 'update')->name('komoditas_desa.update');
        Route::delete('destroy/{id}', 'destroy')->name('komoditas_desa.destroy');
    });
 
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});