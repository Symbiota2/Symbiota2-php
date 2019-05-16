<?php

namespace Core\Controller;

use Core\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    private $em;
    private $tokenStorage;

    public function __construct(
        EntityManagerInterface $em,
        TokenStorageInterface $tokenStorage
    )
    {
        $this->em = $em;
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
        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();

        if (!$token || !$token->isAuthenticated() || !$user instanceof Users) {
            return new JsonResponse([]);
        }

        $userId = $user->getId();

        $q = $this->em->createQuery('SELECT ur FROM Core\Entity\UserRoles ur WHERE ur.userId = '.$userId);
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $permissionArr[$row[0]->getRole()][] = $row[0]->getTableId();
        }

        return new JsonResponse([
            'id' => $userId,
            'firstName' => $user->getFirstName(),
            'permissions' => $permissionArr,
            'maintainLogin' => $user->getMaintainLogin(),
            'tokenExpire' => $user->getTokenExpiration()
        ]);
    }

    /**
     * @Route(
     *     name="logout_user",
     *     path="/api/logout",
     *     methods={"GET"}
     * )
     */
    public function logoutUser()
    {
        $res = new Response();
        $res->headers->clearCookie('BEARER');
        $res->send();
    }

    /**
     * @Route(
     *     name="check_user_username",
     *     path="/api/checkusername/{username}",
     *     methods={"GET"}
     * )
     */
    public function checkUsername($username)
    {
        $repository = $this->em->getRepository('Core\Entity\Users');
        $result = $repository->findBy(['username' => $username]);

        if (!$result) {
            throw $this->createNotFoundException();
        }

        return new JsonResponse([
            'available' => true
        ]);
    }

    /**
     * @Route(
     *     name="check_user_email",
     *     path="/api/checkemail/{email}",
     *     methods={"GET"}
     * )
     */
    public function checkEmail($email)
    {
        $repository = $this->em->getRepository('Core\Entity\Users');
        $result = $repository->findBy(['email' => $email]);

        if (!$result) {
            throw $this->createNotFoundException();
        }

        return new JsonResponse([
            'available' => true
        ]);
    }
}
