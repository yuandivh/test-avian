<?php

use App\Http\Controllers\TableAController;
use App\Http\Controllers\TableBController;
use App\Http\Controllers\TableCController;
use App\Http\Controllers\TableDController;
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
Route::get('/table-b',[TableBController::class,'index'])->name('table_b.index');
Route::get('/table-b/create',[TableBController::class,'create'])->name('table_b.create');
Route::post('/table-b',[TableBController::class,'store'])->name('table_b.store');
Route::get('/table-b/{tablebId}/edit',[TableBController::class,'edit'])->name('table_b.edit');
Route::get('/table-b/export',[TableBController::class,'export'])->name('table_b.export');
Route::get('/table-b/export-template',[TableBController::class,'exportTemplate'])->name('table_b.export-template');
Route::post('/table-b/import',[TableBController::class,'import'])->name('table_b.import');
Route::get('/table-b/pdf',[TableBController::class,'exportPdf'])->name('table_b.pdf');
Route::put('/table-b/{tablebId}',[TableBController::class,'update'])->name('table_b.update');
Route::delete('/table-b/{tablebId}',[TableBController::class,'destroy'])->name('table_b.destroy');

// Table C
Route::get('/table-c',[TableCController::class,'index'])->name('table_c.index');
Route::get('/table-c/create',[TableCController::class,'create'])->name('table_c.create');
Route::post('/table-c',[TableCController::class,'store'])->name('table_c.store');
Route::get('/table-c/{tablecId}/edit',[TableCController::class,'edit'])->name('table_c.edit');
Route::get('/table-c/export',[TableCController::class,'export'])->name('table_c.export');
Route::get('/table-c/export-template',[TableCController::class,'exportTemplate'])->name('table_c.export-template');
Route::post('/table-c/import',[TableCController::class,'import'])->name('table_c.import');
Route::get('/table-c/pdf',[TableCController::class,'exportPdf'])->name('table_c.pdf');
Route::put('/table-c/{tablecId}',[TableCController::class,'update'])->name('table_c.update');
Route::delete('/table-c/{tablecId}',[TableCController::class,'destroy'])->name('table_c.destroy');

// Table D
Route::get('/table-d',[TableDController::class,'index'])->name('table_d.index');
Route::get('/table-d/create',[TableDController::class,'create'])->name('table_d.create');
Route::post('/table-d',[TableDController::class,'store'])->name('table_d.store');
Route::get('/table-d/{tabledId}/edit',[TableDController::class,'edit'])->name('table_d.edit');
Route::get('/table-d/export',[TableDController::class,'export'])->name('table_d.export');
Route::get('/table-d/export-template',[TableDController::class,'exportTemplate'])->name('table_d.export-template');
Route::post('/table-d/import',[TableDController::class,'import'])->name('table_d.import');
Route::get('/table-d/pdf',[TableDController::class,'exportPdf'])->name('table_d.pdf');
Route::put('/table-d/{tabledId}',[TableDController::class,'update'])->name('table_d.update');
Route::delete('/table-d/{tabledId}',[TableDController::class,'destroy'])->name('table_d.destroy');
