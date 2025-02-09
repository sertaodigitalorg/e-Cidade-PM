<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

//#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Entity]
#[ORM\Table(name: "configuracoes.db_usuarios")]
class User implements UserInterface
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

    public function getUsername(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->senha;
    }

    public function getRoles(): array
    {
        return ['ROLE_USER']; // Pode ser ajustado conforme a necessidade
    }

    public function eraseCredentials(): void
    {
        // Metodo obrigatorio, mas pode ficar vazio
    }

    public function getUserIdentifier(): string 
    {
        return $this->getUsername();
    }
}
