<?php


use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('beranda');
// });


Route::get('/', [PageController::class, 'login'])->name('login');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login/process', [PageController::class, 'loginProcess'])->name('login.process');

Route::get('/dashboard', [PageController::class, 'beranda'])->name('beranda');
Route::get('/myrencanaku', [PageController::class, 'myrencanaku'])->name('rencana');
Route::post('/myrencanaku/add', [PageController::class, 'addRencana'])->name('rencana.add');
Route::post('/myrencanaku/toggle/{index}', [PageController::class, 'toggleRencana'])->name('rencana.toggle');
Route::post('/myrencanaku/delete/{index}', [PageController::class, 'deleteRencana'])->name('rencana.delete');

Route::get('/profil', [PageController::class, 'profil'])->name('profil');