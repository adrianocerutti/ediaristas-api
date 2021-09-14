<?php

namespace App\Http\Hateoas;

class Index
{
    /**
     * Links do Hateoas
     */
    protected array $links = [];

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

    /**
     * Adiciona um link no Hateoas
     *
     * @param string $metodo
     * @param string $descricao
     * @param string $nomeRota
     * @param array $parametrosRota
     * @return void
     */
    public function adicionaLink(
        string $metodo,
        string $descricao,
        string $nomeRota,
        array $parametrosRota = []
    ) {
        $this->links[] = [
            "type" => $metodo,
            "rel" => $descricao,
            "uri" => route($nomeRota, $parametrosRota)
        ];
    }
}