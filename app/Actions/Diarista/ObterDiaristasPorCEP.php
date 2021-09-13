<?php

namespace App\Actions\Diarista;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use App\Services\ConsultaCep\ConsultaCEPInterface;

class ObterDiaristasPorCEP
{
    public function __construct(
        private ConsultaCEPInterface $servicoCEP
    ){}

    public function executar(string $cep): array
    {
        $dados = $this->servicoCEP->buscar($cep);

        if ($dados === false) {
            throw ValidationException::withMessages(['cep' => 'CEP não encontrado']);
        }

        return [
            User::diaristasDisponivelCidade($dados->ibge),
            User::diaristasDisponivelCidadeTotal($dados->ibge)
        ];
    }
}