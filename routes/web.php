<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ResultController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'user'], 'prefix' => 'user'], function () {

    Route::resource('applicants', ApplicantController::class);
    Route::resource('exams', ExamController::class);
    Route::resource('results', ResultController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
});

// User Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'user'])->name('dashboard');


// Admin Dashboard
Route::get('/admin_dashboard', function () {
    return view('admin_dashboard');
})->middleware(['auth', 'admin'])->name('admin_dashboard');


require __DIR__ . '/auth.php';


// to-do s
// validationlar gelecek
// admin route u tanımlanacak ve bunun için ayrı bir auth olacak
// uzmanlık ekleme sayfası gelecek
// her sayfada çalışan bir filtre gelecek (livewire component)
// kişi ekleme butonu kalkacak (results sayfası) arama componenti uzatılacak - OK
// mesajların ekrana basılması
// aday bilgilerini güncelleme
// Sınavların kategorilenmesi
// son eklenen sınavın başta gözükmesi
// Aktif sınavlar ayrıca yukarıda gözüksün
// Tüm sayfalar responsive hale getirilecek