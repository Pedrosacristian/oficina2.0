<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\idController; 

Route::get('/', function() {
    return view ('/home');
});

Route::get('/orcamento/busca', [idController::class, 'search']);
Route::get('/orcamento/busca', [idController::class, 'index']);
Route::get('/orcamento/create', [idController::class, 'create']);
Route::post('/orcamento', [idController::class, 'store']);
Route::delete('/orcamento/{id}', [idController::class, 'destroy']);
Route::get('/orcamento/edit/{id}', [idController::class, 'edit']);
