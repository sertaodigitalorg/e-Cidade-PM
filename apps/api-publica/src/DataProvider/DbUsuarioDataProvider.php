<?php

namespace App\DataProvider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use ECidade\DataBaseLibrary\Repository\DbUsuarioRepository;
use ECidade\DataBaseLibrary\Entity\DbUsuario;
use App\ApiResource\ApiDbUsuario;

class DbUsuarioDataProvider implements ProviderInterface
{
    private DbUsuarioRepository $usuarioRepository;

    public function __construct(DbUsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): ApiDbUsuario|array|null
    {
        // Se for uma operação de coleção (listagem de usuários)
        if (str_contains($operation->getName(), '_collection')) {
            $usuarios = $this->usuarioRepository->findAll();
            return array_map(fn(DbUsuario $usuario) => new ApiDbUsuario($usuario), $usuarios);
        }

        // Se for uma operação de item (busca por um usuário específico)
        if (isset($uriVariables['idUsuario'])) {
            $usuario = $this->usuarioRepository->find($uriVariables['idUsuario']);
            return $usuario ? new ApiDbUsuario($usuario) : null;
        }

        return null;
    }
}
