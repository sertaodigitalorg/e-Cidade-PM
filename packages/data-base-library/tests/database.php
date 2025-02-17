<?php

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\DbUsuarioRepository;
use App\Entity\DbUsuario;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

// Carregar variáveis de ambiente
$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/../.env');

// Inicializar o Symfony Kernel
$kernel = new \App\Kernel('test', true);
$kernel->boot();

// Obter o container de serviços
$container = $kernel->getContainer();

/** @var EntityManagerInterface $entityManager */
$entityManager = $container->get('doctrine.orm.entity_manager');

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
