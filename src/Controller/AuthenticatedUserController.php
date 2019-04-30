<?php

namespace Core\Controller;

use Core\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AuthenticatedUserController extends AbstractController
{
    private $em;
    private $json;
    private $tokenStorage;

    public function __construct(
        EntityManagerInterface $em,
        JsonResponse $json,
        TokenStorageInterface $tokenStorage
    )
    {
        $this->em = $em;
        $this->json = $json;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @Route(
     *     name="authenticated_user",
     *     path="/api/authuser",
     *     methods={"GET"}
     * )
     */
    public function getAuthenticatedUser()
    {
        $permissionArr = array();
        $user = $this->tokenStorage->getToken()->getUser();
        $userId = $user->getId();

        if (!$user instanceof Users) {
            return $this->json([]);
        }

        $q = $this->em->createQuery('SELECT ur FROM Core\Entity\UserRoles ur WHERE ur.userId = '.$userId);
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $permissionArr[$row[0]->getRole()][] = $row[0]->getTableId();
        }

        return $this->json(
            [
                'id' => $userId,
                'firstName' => $user->getFirstName(),
                'permissions' => $permissionArr,
                'maintainLogin' => $user->getMaintainLogin(),
                'tokenExpire' => $user->getTokenExpiration()
            ]
        );
    }
}
