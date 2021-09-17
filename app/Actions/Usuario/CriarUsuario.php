<?php

namespace App\Actions\Usuario;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class CriarUsuario
{
    /**
     * Cadastra um usuário no banco de dados
     *
     * @param array $dados
     * @param UploadedFile $foto_documento
     * @return User
     */
    public function executar(array $dados, UploadedFile $foto_documento): User
    {
        $dados['foto_documento'] = $foto_documento->store('local');

        $dados['password'] = Hash::make($dados['password']);

        return User::create($dados);
    }
}
