<?php

use App\Http\Controllers\DiagnosticosController;
use App\Http\Livewire\About;
use App\Http\Livewire\ContactUs;
use App\Http\Livewire\Home;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\DiagnosticoEdit;
use App\Http\Livewire\DiagnosticoRecursos;
use App\Http\Livewire\Diagnosticos;
use App\Http\Livewire\DiagnosticoView;
use App\Http\Livewire\Gts;
use App\Http\Livewire\HardwareReport;
use App\Http\Livewire\FlujosReport;
use App\Http\Livewire\PrivacyPolicy;
use App\Http\Livewire\Quejas\Quejas;
use App\Http\Livewire\SoftwaresReport;
use App\Http\Livewire\Support;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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
Route::get('privacy-policy', PrivacyPolicy::class)->name('privacy-policy');
Route::get('support', Support::class)->name('support');
Route::get('gts', Gts::class)->name('gts');

// Administration routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    Route::get('diagnosticos', Diagnosticos::class)->name('diagnosticos');
    Route::get('diagnostico/show/{id}', [DiagnosticosController::class, 'show'])->name('diagnostico-show');
    Route::get('diagnostico/create', [DiagnosticosController::class, 'create'])->name('diagnostico-create');
    Route::post('diagnostico/store', [DiagnosticosController::class, 'store'])->name('diagnostico-store');
    // Route::get('diagnostico/edit/{id}', [DiagnosticosController::class, 'edit'])->name('diagnostico-edit');
    Route::patch('diagnostico/update/{id}', [DiagnosticosController::class, 'update'])->name('diagnostico-update');

    Route::get('/diagnostico/edit/{id}', DiagnosticoEdit::class)->name('diagnostico-edit');
    Route::get('/diagnostico/edit/{id}/recursos', DiagnosticoRecursos::class)->name('diagnostico-recursos');
    Route::get('/diagnostico/view/{id}', DiagnosticoView::class)->name('diagnostico-view');

    // Reportes
    Route::get('/diagnostico/hardware-report', HardwareReport::class)->name('hardware-report');
    Route::get('/diagnostico/softwares-report', SoftwaresReport::class)->name('softwares-report');
    Route::get('/diagnostico/flujos-report', FlujosReport::class)->name('flujos-report');


    // Quejas
    Route::get('quejas', Quejas::class)->name('quejas');

    // Users and Roles
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});