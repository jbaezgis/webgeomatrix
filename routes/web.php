<?php

use App\Http\Livewire\About;
use App\Http\Livewire\ContactUs;
use App\Http\Livewire\Home;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Diagnosticos;
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

Route::get('/', Home::class)->name('home');
Route::get('about', About::class)->name('about');
Route::get('contact-us', ContactUs::class)->name('contact-us');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Administration routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('diagnosticos', Diagnosticos::class)->name('diagnosticos');
});