<?php

namespace Core\Controller;

use ApiPlatform\Core\Validator\ValidatorInterface;
use Core\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ResetPasswordController
{
    private $validator;
    private $userPasswordEncoder;
    private $em;
    private $tokenManager;

    public function __construct(
        ValidatorInterface $validator,
        UserPasswordEncoderInterface $userPasswordEncoder,
        EntityManagerInterface $entityManager,
        JWTTokenManagerInterface $tokenManager
    )
    {
        $this->validator = $validator;
        $this->userPasswordEncoder = $userPasswordEncoder;
        $this->em = $entityManager;
        $this->tokenManager = $tokenManager;
    }

    public function __invoke(Users $data)
    {
        $this->validator->validate($data);

        $data->setPassword(
            $this->userPasswordEncoder->encodePassword(
                $data, $data->getNewPassword()
            )
        );

        $data->setPasswordChangeDate(time());

        $this->em->flush();

        $token = $this->tokenManager->create($data);

        return new JsonResponse(['token' => $token]);
    }
}
