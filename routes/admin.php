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
use OEngine\Admin\Http\Livewire\Dashboard;
use OEngine\Admin\Http\Livewire\Setting;

Route::get('/', Dashboard::class)->name('admin.home');
Route::get('/setting', Setting::class)->name('admin.setting');
