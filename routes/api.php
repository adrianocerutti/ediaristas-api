<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObtemServicos;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Usuario\CadastroController;
use App\Http\Controllers\Endereco\BuscaCepApiExterna;
use App\Http\Controllers\Diarista\ObtemDiaristasPorCEP;
use App\Http\Controllers\Diarista\VerificaDisponibilidade;
use App\Http\Controllers\Usuario\AutenticacaoController;
use App\Http\Controllers\Diaria\CadastroController as DiariaCadastroController;

Route::get('/', IndexController::class);

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/me', [AutenticacaoController::class, 'me'])->name('usuarios.show');
    Route::post('/diarias', [DiariaCadastroController::class, 'store'])->name('diarias.store');
});

Route::get('/diaristas/localidades', ObtemDiaristasPorCEP::class)->name('diarista.busca_por_cep');
Route::get('/diaristas/disponibilidade', VerificaDisponibilidade::class)->name('enderecos.disponibilidade');
Route::get('/enderecos',BuscaCepApiExterna::class)->name('enderecos.cep');

Route::get('/servicos', ObtemServicos::class)->name('servicos.index');

Route::post('/usuarios',[CadastroController::class, 'store'])->name('usuarios.create');
