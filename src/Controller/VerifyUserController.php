<?php

namespace App\Controller;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VerifyUserController
{
    private $requestStack;
    private $em;

    public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
        $this->em = $entityManager;
    }

    public function __invoke($data)
    {
        if(!$data instanceof Users) {
            //throw new NotFoundHttpException();
            return Response::HTTP_NOT_FOUND;
        }

        $requestToken = $this->requestStack->getCurrentRequest()->get('token');
        $userToken = $data->getVerificationToken();

        if($requestToken == $userToken) {
            $data->setVerified(1);
            $data->setVerificationToken(null);
            $this->em->flush();

            return Response::HTTP_OK;
        }

        return Response::HTTP_BAD_REQUEST;
    }
}
