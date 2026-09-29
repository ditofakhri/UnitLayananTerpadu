<?php

use App\Http\Controllers\LogPenjagaController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\ReportController;

Route::get('/', fn() => redirect()->route('dashboard'));

Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

// LOG PENJAGA
Route::get('/log-penjaga', [LogPenjagaController::class, 'index'])->name('log.index');
Route::get('/log-penjaga/create', [LogPenjagaController::class, 'create'])->name('log.create');
Route::post('/log-penjaga', [LogPenjagaController::class, 'store'])->name('log.store');
Route::get('/log-penjaga/{log}/edit', [LogPenjagaController::class, 'edit'])->name('log.edit');
Route::put('/log-penjaga/{log}', [LogPenjagaController::class, 'update'])->name('log.update');


// TAMU
Route::get('/tamu', [TamuController::class, 'index'])->name('tamu.index');
Route::get('/tamu/create', [TamuController::class, 'create'])->name('tamu.create');
Route::post('/tamu', [TamuController::class, 'store'])->name('tamu.store');
Route::get('/tamu/{tamu}/edit', [TamuController::class, 'edit'])->name('tamu.edit');
Route::put('/tamu/{tamu}', [TamuController::class, 'update'])->name('tamu.update');
Route::delete('/tamu/{tamu}', [TamuController::class, 'destroy'])->name('tamu.destroy');

// REPORT
Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::post('/report/log-pdf', [ReportController::class, 'logPdf'])->name('report.log.pdf');
Route::post('/report/tamu-excel', [ReportController::class, 'tamuExcel'])->name('report.tamu.excel');
