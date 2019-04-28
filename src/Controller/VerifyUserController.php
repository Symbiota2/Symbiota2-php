<?php

namespace Core\Controller;

use Core\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

class VerifyUserController extends AbstractController
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
            return Response::HTTP_NOT_FOUND;
        }

        $requestToken = $this->requestStack->getCurrentRequest()->get('token');
        $userToken = $data->getVerificationToken();

        if($requestToken == $userToken) {
            $data->setVerified(1);
            $data->setVerificationToken(null);
            $this->em->flush();
        }

        return $this->redirect('http://localhost:4200');
    }
}
