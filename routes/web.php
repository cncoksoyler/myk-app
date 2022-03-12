<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UserController;
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
    Route::resource('results', ResultController::class)->except(['index']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::resource('users', UserController::class);
    Route::resource('professions', ProfessionController::class);
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});



// // Admin Dashboard
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


require __DIR__ . '/auth.php';


// TODO s
// Uygylamanın adına karar verilecek
// Ana sayfaya gelen bilgiler girilecek ve düzenlenecek
// Remember me dğru çalışmıyor
// validationlar gelecek - ok
// admin route u tanımlanacak ve bunun için ayrı bir auth olacak - Ok
// uzmanlık ekleme sayfası gelecek - ok
// her sayfada çalışan bir filtre gelecek (livewire component)
// kişi ekleme butonu kalkacak (results sayfası) arama componenti uzatılacak - OK
// mesajların ekrana basılması - ok
//       Login sayfasında dil düzeltilecek
// aday bilgilerini güncelleme
// Sınavların kategorilenmesi - ok
// son eklenen sınavın başta gözükmesi
// Aktif sınavlar ayrıca yukarıda gözüksün
// Tüm sayfalar responsive hale getirilecek
// Aday silme aktif hale getirilecek