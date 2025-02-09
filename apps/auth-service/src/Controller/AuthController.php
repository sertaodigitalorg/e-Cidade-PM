<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use App\Entity\User;

class AuthController extends AbstractController
{
    #[Route('/api/login', name: 'auth_login', methods: ['POST'])]
    public function login(
        Request $request,
        EntityManagerInterface $entityManager,
        JWTTokenManagerInterface $JWTManager
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);
        $login = $data['login'] ?? '';
        $password = $data['senha'] ?? '';

        // Buscar o usuário no banco de dados
        $user = $entityManager->getRepository(User::class)->findOneBy(['login' => $login]);

        /** 
         * Verificar se o usuário existe e validar a senha com SHA-1
         *  
         * @TODO   O SHA-1 é considerado inseguro! 
         *         migrar para bcrypt para melhorar 
         *         a segurança das senhas.
         * Autentição por bcrypt abaixo!
        */
        if (!$user || hash('sha1', $password) !== $user->getPassword()) {
            return $this->json(['error' => hash('sha1', $password).' = Usuário ou senha inválidos'], 401);
        }

        /* Codigo mais seguro usando bcrypt, sha1 tem falhas de seguraça
        if (!$user || !password_verify($password, $user->getPassword())) {
            return $this->json(['error' => 'Usuário ou senha inválidos'], 401);
        }
        */

        // Gerar o token JWT
        $token = $JWTManager->create($user);

        return $this->json([
            'token' => $token
        ]);
    }
}