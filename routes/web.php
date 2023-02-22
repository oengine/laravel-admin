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

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use OEngine\Admin\Http\Controllers\AuthController;
use OEngine\Platform\Middleware\ThemeAdmin;

Route::name('auth.')->prefix('auth')->middleware(ThemeAdmin::class)->group(function () {
    Route::get('login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('login', [AuthController::class, 'postLogin'])->name('login');

    Route::get('sign-up', function () {
        return view('theme:page.auth.sign-up');
    })->name('sign-up');
    Route::get('forgot-password', function () {
        return view('theme:page.auth.forgot-password');
    })->name('forgot-password');
});
