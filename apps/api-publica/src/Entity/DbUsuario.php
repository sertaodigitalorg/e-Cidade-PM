<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: "db_usuarios", schema: "configuracoes")]
#[ApiResource(
    operations: [
        new Get(uriTemplate: '/configuracoes/usuario/{id}', security: "is_granted('ROLE_USER')"),
        new GetCollection(uriTemplate: '/configuracoes/usuarios', security: "is_granted('ROLE_USER')"),
        new Post(uriTemplate: '/configuracoes/usuario', security: "is_granted('ROLE_USER')"),
        new Put(uriTemplate: '/configuracoes/usuario/{id}', security: "is_granted('ROLE_USER')"),
        new Delete(uriTemplate: '/configuracoes/usuario/{id}', security: "is_granted('ROLE_USER')")
    ]
)]
class DbUsuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer", options: ["default" => 0])]
    private ?int $idUsuario = null;

    #[ORM\Column(type: "string", length: 60, nullable: true)]
    private ?string $nome = null;

    #[ORM\Column(type: "string", length: 20)]
    #[Assert\NotBlank]
    private string $login;

    #[ORM\Column(type: "string", length: 40)]
    #[Assert\NotBlank]
    private string $senha;

    #[ORM\Column(type: "integer", nullable: true, options: ["default" => 1])]
    private ?int $usuarioativo = 1;

    #[ORM\Column(type: "string", length: 200, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: "integer", nullable: true, options: ["default" => 0])]
    private ?int $usuext = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $administrador = null;

    #[ORM\Column(type: "date")]
    #[Assert\NotBlank]
    private \DateTimeInterface $datatoken;

    // Getters e Setters

    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;
        return $this;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): self
    {
        $this->senha = $senha;
        return $this;
    }

    public function getUsuarioativo(): ?int
    {
        return $this->usuarioativo;
    }

    public function setUsuarioativo(?int $usuarioativo): self
    {
        $this->usuarioativo = $usuarioativo;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getUsuext(): ?int
    {
        return $this->usuext;
    }

    public function setUsuext(?int $usuext): self
    {
        $this->usuext = $usuext;
        return $this;
    }

    public function getAdministrador(): ?int
    {
        return $this->administrador;
    }

    public function setAdministrador(?int $administrador): self
    {
        $this->administrador = $administrador;
        return $this;
    }

    public function getDatatoken(): \DateTimeInterface
    {
        return $this->datatoken;
    }

    public function setDatatoken(\DateTimeInterface $datatoken): self
    {
        $this->datatoken = $datatoken;
        return $this;
    }
}
