<?php

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

/*Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', \App\Livewire\Home::class)->name('home');
Route::get('/dashboard', \App\Livewire\Dashboard::class)->middleware(['auth'])->name('dashboard');

Route::get('/add-admin', \App\Livewire\Admin::class)->middleware(['auth', 'super-admin'])->name('add-admin');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/categories', \App\Livewire\Categories::class)->name('categories');
    Route::get('/products', \App\Livewire\Products::class)->name('products');
});
