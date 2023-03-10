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
use OEngine\Admin\Http\Livewire\Table\Index as TableIndex;
use OEngine\Admin\Http\Livewire\Table\Edit as TableEdit;
use OEngine\Admin\Http\Livewire\Table\Setting as TableSetting;

Route::get('/', Dashboard::class)->name('admin.home');
Route::get('/setting', Setting::class)->name('admin.setting');
Route::get('/table/list', TableIndex::class)->name('admin.table.list');
Route::get('/table/setting', TableSetting::class)->name('admin.table.setting');
Route::get('/table/setting/{table}', TableSetting::class)->name('admin.table.setting.edit');
Route::get('/table/{table}', TableIndex::class)->name('admin.table');
Route::get('/table/{table}/add', TableEdit::class)->name('admin.table.add');
Route::get('/table/{table}/edit/{id}', TableEdit::class)->name('admin.table.edit');
