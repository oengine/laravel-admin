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

use Illuminate\Support\Facades\Route;
use OEngine\Admin\Http\Livewire\Auth\ForgotPassword;
use OEngine\Admin\Http\Livewire\Auth\Login;
use OEngine\Admin\Http\Livewire\Auth\Signup;
use OEngine\Platform\Middleware\LayoutFull;
use OEngine\Platform\Middleware\ThemeAdmin;

Route::name('auth.')->prefix('auth')->middleware(ThemeAdmin::class, LayoutFull::class)->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('sign-up', Signup::class)->name('sign-up');
    Route::get('forgot-password', ForgotPassword::class)->name('forgot-password');
});
