<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObtemServicos;
use App\Http\Controllers\Endereco\BuscaCepApiExterna;
use App\Http\Controllers\Diarista\ObtemDiaristasPorCEP;
use App\Http\Controllers\Diarista\VerificaDisponibilidade;

Route::get('/diaristas/localidades', ObtemDiaristasPorCEP::class)->name('diarista.busca_por_cep');
Route::get('/diaristas/disponibilidade', VerificaDisponibilidade::class)->name('enderecos.disponibilidade');
Route::get('/enderecos',BuscaCepApiExterna::class)->name('enderecos.cep');

Route::get('/servicos', ObtemServicos::class)->name('servicos.index');