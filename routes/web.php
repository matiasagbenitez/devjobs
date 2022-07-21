<?php

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
});

Route::get('/dashboard', [VacantController::class, 'index'])->middleware(['auth', 'verified'])->name('vacants.index');
Route::get('/vacants/create', [VacantController::class, 'create'])->middleware(['auth', 'verified'])->name('vacants.create');

require __DIR__.'/auth.php';
