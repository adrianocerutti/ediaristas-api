<?php

namespace App\Services\ConsultaCep;

use Illuminate\Support\Facades\Http;

class viaCEP
{
    /**
     * Buscar endereço utilizando a api do viaCEP
     * 
     * @param string $cep
     * @return void
     */

    public function buscar(string $cep)
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

        return $dados;
    }
}