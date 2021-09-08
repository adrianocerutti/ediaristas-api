<?php

namespace App\Services\ConsultaCep;

interface ConsultaCEPInterface
{
    public function buscar(string $cep): false|EnderecoResponse;
}