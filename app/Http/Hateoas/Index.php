<?php

namespace App\Http\Hateoas;

class Index extends HateoasBase implements HateoasInterface
{
    /**
     * Retorna os links do Hateoas para a rota inicial
     *
     * @return array
     */
    public function links(): array
    {
        $this->adicionaLink("GET", "diaristas_cidade", "diarista.busca_por_cep");
        $this->adicionaLink("GET", "verificar_disponibilidade_atendimento", "enderecos.disponibilidade");
        $this->adicionaLink("GET", "endereco_cep", "enderecos.cep");
        $this->adicionaLink("GET", "listar_servicos", "servicos.index");

        return $this->links;
    }
}