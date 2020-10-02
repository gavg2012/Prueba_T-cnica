<?php

use Illuminate\Support\Facades\Route;

//Ruta de carga inicial
Route::get('/', 'UsodeApi@InicioApi')->name('PrimeraCargaApi');

//Ruta de carga de filtros
Route::post('/buscar', 'UsodeApi@Filtrar')->name('FiltrosdeDato');
