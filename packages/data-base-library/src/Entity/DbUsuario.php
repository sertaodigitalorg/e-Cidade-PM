<?php

namespace App\Entity;

use App\Repository\DbUsuarioRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DbUsuarioRepository::class)]
#[ORM\Table(name: "db_usuarios", schema: "configuracoes")]
class DbUsuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_usuario", type: "integer", options: ["default" => 0])]
    private ?int $idUsuario = null;

    #[ORM\Column(type: "string", length: 60, nullable: true)]
    private ?string $nome = null;

    #[ORM\Column(type: "string", length: 20)]
    #[Assert\NotBlank]
    private string $login;

    #[ORM\Column(type: "string", length: 40)]
    #[Assert\NotBlank]
    private string $senha;

    #[ORM\Column(name: "usuarioativo", type: "integer", nullable: true, options: ["default" => 1])]
    private ?int $usuarioAtivo = 1;

    #[ORM\Column(type: "string", length: 200, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(name: "usuext", type: "integer", nullable: true, options: ["default" => 0])]
    private ?int $usuarioExterno = 0;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $administrador = null;

    #[ORM\Column(name: "datatoken", type: "date")]
    #[Assert\NotBlank]
    private \DateTimeInterface $dataToken;

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

    public function getUsuarioAtivo(): ?int
    {
        return $this->usuarioAtivo;
    }

    public function setUsuarioAtivo(?int $usuarioAtivo): self
    {
        $this->usuarioAtivo = $usuarioAtivo;
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

    public function getUsuarioExterno(): ?int
    {
        return $this->usuarioExterno;
    }

    public function setUsuarioExterno(?int $usuarioExterno): self
    {
        $this->usuarioExterno = $usuarioExterno;
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

    public function getDataToken(): \DateTimeInterface
    {
        return $this->dataToken;
    }

    public function setDataToken(\DateTimeInterface $dataToken): self
    {
        $this->dataToken = $dataToken;
        return $this;
    }
}
