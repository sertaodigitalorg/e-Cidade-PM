<?php

namespace ECidade\DataBaseLibrary\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use ECidade\DataBaseLibrary\Entity\DbUsuario;

/**
 * @extends ServiceEntityRepository<DbUsuario>
 */
class DbUsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DbUsuario::class);
    }
}
