<?php

use App\Http\Controllers\TableAController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Table A
Route::get('/table-a',[TableAController::class,'index'])->name('table_a.index');
Route::get('/table-a/create',[TableAController::class,'create'])->name('table_a.create');
Route::post('/table-a',[TableAController::class,'store'])->name('table_a.store');
Route::get('/table-a/{tableaId}/edit',[TableAController::class,'edit'])->name('table_a.edit');
Route::get('/table-a/export',[TableAController::class,'export'])->name('table_a.export');
Route::get('/table-a/export-template',[TableAController::class,'exportTemplate'])->name('table_a.export-template');
Route::post('/table-a/import',[TableAController::class,'import'])->name('table_a.import');
Route::get('/table-a/pdf',[TableAController::class,'exportPdf'])->name('table_a.pdf');
Route::put('/table-a/{tableaId}',[TableAController::class,'update'])->name('table_a.update');
Route::delete('/table-a/{tableaId}',[TableAController::class,'destroy'])->name('table_a.destroy');

// Table B
