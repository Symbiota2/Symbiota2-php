<?php
namespace Core\Controller;

use ApiPlatform\Core\Validator\ValidatorInterface;
use Core\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class ChangePasswordController
{
    private $validator;
    private $userPasswordEncoder;
    private $em;
    private $tokenManager;
    private $requestStack;

    public function __construct(
        ValidatorInterface $validator,
        UserPasswordEncoderInterface $userPasswordEncoder,
        EntityManagerInterface $entityManager,
        JWTTokenManagerInterface $tokenManager,
        RequestStack $requestStack
    )
    {
        $this->validator = $validator;
        $this->userPasswordEncoder = $userPasswordEncoder;
        $this->em = $entityManager;
        $this->tokenManager = $tokenManager;
        $this->requestStack = $requestStack;
    }

    public function __invoke(Users $user)
    {
        $returnCode = 0;

        if (!$user instanceof Users) {
            return false;
        }

        $request = json_decode($this->requestStack->getCurrentRequest()->getContent(),true);
        $maintainLogin = (array_key_exists('maintainLogin', $request) ? $request['maintainLogin'] : 0);

        if ($this->userPasswordEncoder->isPasswordValid($user, $request['oldPassword'])) {
            $this->validator->validate($user);
            $user->setPassword(
                $this->userPasswordEncoder->encodePassword(
                    $user, $user->getNewPassword()
                )
            );
            $user->setPasswordChangeDate(time());
            $this->em->flush();

            $res = new Response();
            $res->headers->clearCookie('BEARER');
            $res->send();
        }
        else {
            $returnCode = 1;
        }

        $response = new JsonResponse(
            $returnCode
        );

        if ($returnCode === 0) {
            $token = $this->tokenManager->create($user);
            if($maintainLogin) {
                $cookieExp = 31536000;
            }
            else {
                $cookieExp = 9000;
            }
            $cookie = new Cookie(
                'BEARER',
                $token,
                time() + $cookieExp,
                '',
                $_SERVER['SERVER_NAME']
            );
            $response->headers->setCookie($cookie);
        }

        return $response;
    }
}
