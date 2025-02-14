<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use ECidade\DataBaseLibrary\Entity\DbUsuario;


#[ApiResource(
    operations: [   
        new Get(uriTemplate: '/configuracoes/usuario/{idUsuario}', security: "is_granted('ROLE_USER')"),
        new GetCollection(uriTemplate: '/configuracoes/usuarios', security: "is_granted('ROLE_USER')"),
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
}
