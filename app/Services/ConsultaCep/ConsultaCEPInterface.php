<?php

namespace App\Services\ConsultaCep;

interface ConsultaCEPInterface
{
    /**
     * Define padrão para busca de endereço a partir do CEP
     *
     * @param string $cep
     * @return false|EnderecoResponse
     */
    public function buscar(string $cep): false|EnderecoResponse;
}