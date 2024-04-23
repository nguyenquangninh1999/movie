<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\Client\MovieClientController;

Route::get('/', [MovieClientController::class, 'index'])->name('client.index');
Route::get('/{id}', [MovieClientController::class, 'show'])->name('client.show');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
        Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
        Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
        Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('/movies', MovieController::class);
        Route::resource('/categories', CategoryController::class);
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    });
});
