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
    #[ORM\Column(name: "id_usuario", type: "integer")]
    private int $idUsuario;

    #[ORM\Column(type: "string", length: 60)]
    private string $nome;

    #[ORM\Column(type: "string", length: 20, unique: true)]
    private string $login;

    #[ORM\Column(type: "string", length: 40)]
    private string $senha; // Senha ja criptografada no banco

    #[ORM\Column(name: "usuarioativo", type: "integer", options: ["default" => 1])]
    private int $usuarioAtivo;

    #[ORM\Column(type: "string", length: 200, nullable: true)]
    private ?string $email;

    #[ORM\Column(name: "usuext", type: "integer", options: ["default" => 0])]
    private int $usurioExterno;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $administrador;

    #[ORM\Column(name: "datatoken", type: "date")]
    private \DateTimeInterface $dataToken;

    public function getId(): int
    {
        return $this->idUsuario;
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
        return $this->idUsuario;
    }
}
