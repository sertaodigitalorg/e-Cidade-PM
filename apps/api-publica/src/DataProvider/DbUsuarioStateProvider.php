<?php

namespace App\DataProvider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\ApiDbUsuario;
use ECidade\DataBase\Entity\DbUsuario;
use ECidade\DataBase\Repository\DbUsuarioRepository;
use ECidade\DataBase\Utils\DataBaseHelper;

/**
 * State Provider para a API Platform 4.0 buscando dados da data-base-library
 * 
 * @implements ProviderInterface<ApiDbUsuario|array|null>
 */
class DbUsuarioStateProvider implements ProviderInterface
{
    private DbUsuarioRepository $usuarioRepository;

    public function __construct()
    {
        // Obter o EntityManager usando a classe helper
        $entityManager = DataBaseHelper::getEntityManager();

        // Obter o repositório
        $this->usuarioRepository = $entityManager->getRepository(DbUsuario::class);
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): ApiDbUsuario|array|null
    {
        // Se for uma coleção de usuários (GET /configuracoes/usuarios)
        if ($operation instanceof \ApiPlatform\Metadata\GetCollection) {
            $usuarios = $this->usuarioRepository->findAll();
            return array_map(fn($usuario) => new ApiDbUsuario($usuario), $usuarios);
        }

        // Se for um único usuário (GET /configuracoes/usuario/{idUsuario})
        if ($operation instanceof \ApiPlatform\Metadata\Get && isset($uriVariables['idUsuario'])) {
            $usuario = $this->usuarioRepository->find($uriVariables['idUsuario']);
            return $usuario ? new ApiDbUsuario($usuario) : null;
        }

        return null;
    }
}