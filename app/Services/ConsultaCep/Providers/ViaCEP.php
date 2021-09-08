<?php

namespace App\Services\ConsultaCep\Providers;

use Illuminate\Support\Facades\Http;
use App\Services\ConsultaCep\EnderecoResponse;
use App\Services\ConsultaCep\ConsultaCEPInterface;

class viaCEP implements ConsultaCEPInterface
{
    /**
     * Buscar endereço utilizando a api do viaCEP
     *
     * @param string $cep
     * @return false|EnderecoResponse
     */

    public function buscar(string $cep): false|EnderecoResponse
    {
        //transformar o cep no código do IBGE
        $resposta = Http::get("https://viacep.com.br/ws/$cep/json/");

        if ($resposta->failed()) {
            return false;
        }

        $dados = $resposta->json();

        if (isset($dados['erro']) && $dados['erro'] === true) {
            return false;
        }

        return $this->populaEnderecoResponse($dados);
    }

    /**
     * formata a saída para endereço response
     *
     * @param array $dados
     * @return EnderecoResponse
     */
    private function populaEnderecoResponse(array $dados): EnderecoResponse
    {
        return new EnderecoResponse(
            cep: $dados['cep'],
            logradouro: $dados['logradouro'],
            complemento: $dados['complemento'],
            bairro: $dados['bairro'],
            localidade: $dados['localidade'],
            uf: $dados['uf'],
            ibge: $dados['ibge'],
        );
    }
}