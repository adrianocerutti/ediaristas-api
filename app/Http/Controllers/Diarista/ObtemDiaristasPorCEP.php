<?php

namespace App\Http\Controllers\Diarista;

use App\Http\Controllers\Controller;
use App\Http\Resources\DiaristaPublico;
use App\Http\Resources\DiaristaPublicoCollection;
use App\Models\User;
use App\Services\ConsultaCep\viaCEP;
use Illuminate\Http\Request;

class ObtemDiaristasPorCEP extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, viaCEP $servicoCEP)
    {
        $dados = $servicoCEP->buscar($request->cep);

        if ($dados === false) {
            return response()->json(['erro' => 'CEP Inválido'], 400);
        }

        return new DiaristaPublicoCollection(
            User::diaristasDisponivelCidade($dados['ibge']),
            User::diaristasDisponivelCidadeTotal($dados['ibge'])
        );
    }
}
