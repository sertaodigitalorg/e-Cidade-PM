<?php

namespace ECidade\DataBase\Utils;

use ECidade\DataBase\Kernel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Dotenv\Dotenv;

class DatabaseHelper
{
    private static ?EntityManagerInterface $entityManager = null;

    public static function getEntityManager(): EntityManagerInterface
    {
        if (self::$entityManager === null) {
            // Carregar o arquivo .env manualmente
            $dotenv = new Dotenv();
            $dotenv->load(dirname(__DIR__, 2) . '/.env');

            // Inicializar o Kernel da `data-base-library`
            $kernel = new Kernel('prod', false);
            $kernel->boot();
            $container = $kernel->getContainer();

            /** @var EntityManagerInterface $entityManager */
            self::$entityManager = $container->get('doctrine.orm.entity_manager');
        }

        return self::$entityManager;
    }
}