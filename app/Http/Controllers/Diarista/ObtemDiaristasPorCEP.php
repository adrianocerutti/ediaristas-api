<?php

namespace App\Http\Controllers\Diarista;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\CepRequest;
use App\Http\Controllers\Controller;
use App\Actions\Diarista\ObterDiaristasPorCEP;
use App\Http\Resources\DiaristaPublicoCollection;
use App\Services\ConsultaCep\ConsultaCEPInterface;

class ObtemDiaristasPorCEP extends Controller
{
    public function __construct(
        private ObterDiaristasPorCEP $obterDiaristasPorCEP
    ){}

    /**
     * Busca diaristas pelo CEP
     *
     * @param CepRequest $request
     * @param ConsultaCEPInterface $servicoCEP
     * @return DiaristaPublicoCollection|JsonResponse
     */
    public function __invoke(CepRequest $request): DiaristaPublicoCollection|JsonResponse
    {
        [$diaristasCollection, $quantidadeDiaristas] = $this->obterDiaristasPorCEP->executar($request->cep);

        return new DiaristaPublicoCollection(
            $diaristasCollection,
            $quantidadeDiaristas
        );
    }
}
