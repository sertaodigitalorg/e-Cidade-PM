<?php

use Doctrine\ORM\EntityManagerInterface;
use ECidade\DataBase\Repository\DbUsuarioRepository;
use ECidade\DataBase\Entity\DbUsuario;
use ECidade\DataBase\Utils\DataBaseHelper;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

// Obter o EntityManager usando a classe helper
$entityManager = DataBaseHelper::getEntityManager();

/** @var DbUsuarioRepository $repository */
$repository = $entityManager->getRepository(DbUsuario::class);

// Buscar um usuário pelo ID (exemplo: 1)
$usuario = $repository->find(1);

// Obter o nome da classe do repositório
$repositoryClass = get_class($repository);

if ($usuario) {
    echo "Repositório: " . $repositoryClass . PHP_EOL;
    echo "Entidade: " . $repository->getClassName() . PHP_EOL;
    echo "Usuário encontrado: " . PHP_EOL;
    echo "ID: " . $usuario->getIdUsuario() . PHP_EOL;
    echo "Nome: " . $usuario->getNome() . PHP_EOL;
    echo "Login: " . $usuario->getLogin() . PHP_EOL;
} else {
    echo "Nenhum usuário encontrado com o ID 1." . PHP_EOL;
}
