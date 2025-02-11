<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity]
#[ApiResource]
#[GetCollection(
    security: "is_granted('IS_AUTHENTICATED_FULLY')",
    normalizationContext: ['groups' => ['read_public_user']]
)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id_usuario;

    #[ORM\Column(type: "string", length: 60)]
    private string $nome;

    #[ORM\Column(type: "string", length: 20, unique: true)]
    private string $login;

    #[ORM\Column(type: "string", length: 40)]
    private string $senha; // Senha ja criptografada no banco

    #[ORM\Column(type: "integer", options: ["default" => 1])]
    private int $usuarioativo;

    #[ORM\Column(type: "string", length: 200, nullable: true)]
    private ?string $email;

    #[ORM\Column(type: "integer", options: ["default" => 0])]
    private int $usuext;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $administrador;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $datatoken;

    public function getId(): int
    {
        return $this->id_usuario;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
}
