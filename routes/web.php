<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\DespesasController;
use App\Http\Controllers\DizimoController;
use App\Http\Controllers\MembroController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PontoController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::name('perfil.')->prefix('perfil')->group(function () {
        Route::get('/index', [PerfilController::class, 'index'])->name('index');
        Route::get('/create', [PerfilController::class, 'create'])->name('create');
        Route::post('/store', [PerfilController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PerfilController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [PerfilController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [PerfilController::class, 'destroy'])->name('destroy');
    });

    Route::name('ponto.')->prefix('ponto')->group(function () {
        Route::get('/index', [PontoController::class, 'index'])->name('index');
        Route::get('/create', [PontoController::class, 'create'])->name('create');
        Route::post('/store', [PontoController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PontoController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [PontoController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [PontoController::class, 'destroy'])->name('destroy');
    });

    Route::name('ofertas.')->prefix('oferta')->group(function () {
        Route::get('/index', [OfertasController::class, 'index'])->name('index');
        Route::get('/create', [OfertasController::class, 'create'])->name('create');
        Route::post('/store', [OfertasController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [OfertasController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [OfertasController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [OfertasController::class, 'destroy'])->name('destroy');
    });

    Route::name('cargos.')->prefix('cargo')->group(function () {
        Route::get('/index', [CargoController::class, 'index'])->name('index');
        Route::get('/create', [CargoController::class, 'create'])->name('create');
        Route::post('/store', [CargoController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CargoController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CargoController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [CargoController::class, 'destroy'])->name('destroy');
    });

    Route::name('despesas.')->prefix('despesa')->group(function () {
        Route::get('/index', [DespesasController::class, 'index'])->name('index');
        Route::get('/create', [DespesasController::class, 'create'])->name('create');
        Route::post('/store', [DespesasController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DespesasController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [DespesasController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [DespesasController::class, 'destroy'])->name('destroy');
    });
    Route::name('membros.')->prefix('membro')->group(function () {
        Route::get('/index', [MembroController::class, 'index'])->name('index');
        Route::get('/create', [MembroController::class, 'create'])->name('create');
        Route::post('/store', [MembroController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [MembroController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [MembroController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [MembroController::class, 'destroy'])->name('destroy');
    });
    Route::name('dizimos.')->prefix('dizimo')->group(function () {
        Route::get('/index', [DizimoController::class, 'index'])->name('index');
        Route::get('/create', [DizimoController::class, 'create'])->name('create');
        Route::post('/store', [DizimoController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DizimoController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [DizimoController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [DizimoController::class, 'destroy'])->name('destroy');
    });
});
