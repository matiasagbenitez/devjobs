<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\VacantController;
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
})->name('home');

Route::get('/dashboard', [VacantController::class, 'index'])->middleware(['auth', 'verified', 'recruiter'])->name('vacants.index');
Route::get('/vacants/create', [VacantController::class, 'create'])->middleware(['auth', 'verified'])->name('vacants.create');
Route::get('/vacants/{vacant}/edit', [VacantController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacants.edit');
Route::get('/vacants/{vacant}', [VacantController::class, 'show'])->name('vacants.show');

Route::get('/candidates/{vacant}', [CandidateController::class, 'index'])->middleware(['auth', 'verified', 'recruiter'])->name('canidates.index');

Route::get('/notifications', NotificationController::class)->middleware(['auth', 'verified', 'recruiter'])->name('notifications');

require __DIR__.'/auth.php';
