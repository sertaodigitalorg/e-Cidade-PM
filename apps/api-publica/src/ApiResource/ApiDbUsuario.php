<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use App\DataProvider\DbUsuarioStateProvider;
use ECidade\DataBase\Entity\DbUsuario;

#[ApiResource(
    operations: [   
        new Get(uriTemplate: '/configuracoes/usuario/{idUsuario}', security: "is_granted('ROLE_USER')", provider: DbUsuarioStateProvider::class),
        new GetCollection(uriTemplate: '/configuracoes/usuarios', security: "is_granted('ROLE_USER')", provider: DbUsuarioStateProvider::class),
        new Post(uriTemplate: '/configuracoes/usuario', security: "is_granted('ROLE_USER')"),
        new Put(uriTemplate: '/configuracoes/usuario/{idUsuario}', security: "is_granted('ROLE_USER')"),
        new Delete(uriTemplate: '/configuracoes/usuario/{idUsuario}', security: "is_granted('ROLE_USER')")
    ]
)]
class ApiDbUsuario extends DbUsuario
{
    public int $idUsuario;
    public string $nome;
    public ?string $email;

    public function __construct(DbUsuario $usuario)
    {
        $this->idUsuario = $usuario->getIdUsuario();
        $this->nome = $usuario->getNome();
        $this->email = $usuario->getEmail();
    }

    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
}
