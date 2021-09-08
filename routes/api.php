<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Diarista\ObtemDiaristasPorCEP;

Route::get('/diaristas/localidades', ObtemDiaristasPorCEP::class)->name('diarista.busca_por_cep');