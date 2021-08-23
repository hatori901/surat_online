<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
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

Route::get('/',[WebController::class,'index'])->name('landing');
Route::get('/tentang',[WebController::class,'tentang'])->name('tentang');
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/blogs/{slug}',[BlogController::class,'show'])->name('blogs.show');
Auth::routes(['verify'=> true]);

Route::prefix('/home')->middleware(['auth','verified'])->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/surat', [SuratController::class, 'index'])->name('surat');
    Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
    Route::post('/surat/create',[SuratController::class, 'store'])->name('surat.store');
    Route::get('/settings',[SettingController::class,'index'])->name('settings');
    Route::post('/settings/update/{id}',[SettingController::class,'update'])->name('settings.update');
    Route::post('/settings/password/{id}',[SettingController::class,'update_password'])->name('settings.pass');
    Route::get('/surats',[HomeController::class,'surats'])->name('surats');
    Route::get('/surats/{id}',[SuratController::class,'show'])->name('surats.show');
    Route::post('/surats/{id}/update',[SuratController::class,'update'])->name('surats.update');
    Route::get('/users',[HomeController::class,'users'])->name('users');
    Route::get('/users{id}/edit',[UserController::class,'edit'])->name('users.edit');
    Route::post('/users/{id}/update',[UserController::class,'update'])->name('users.update');
    Route::post('/users/{id}/pass',[UserController::class,'update_password'])->name('users.password');
    Route::post('/users/{id}/delete',[UserController::class,'destroy'])->name('users.destroy');
    Route::get('/blogs',[HomeController::class,'blogs'])->name('blogs');
    Route::get('/blogs/create',[BlogController::class,'create'])->name('blogs.create');
    Route::post('/blogs/store',[BlogController::class,'store'])->name('blogs.store');
    Route::post('/blogs/upload',[BlogController::class,'upload'])->name('blogs.upload');
    Route::post('/blogs/{id}/delete',[BlogController::class,'destroy'])->name('blogs.delete');
    Route::get('/blogs/{id}/edit',[BlogController::class,'edit'])->name('blogs.edit');
    Route::post('/blogs/{id}/update',[BlogController::class,'update'])->name('blogs.update');
});


