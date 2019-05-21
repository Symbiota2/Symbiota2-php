<?php

namespace Core\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfigurationController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route(
     *     name="client_configurations",
     *     path="/api/clientconfigurations",
     *     methods={"GET"}
     * )
     */
    public function getClientConfigurations()
    {
        $configArr = array();

        $q = $this->em->createQuery("SELECT c FROM Core\Entity\Configurations c WHERE c.configurationSide = 'client'");
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $configArr[$row[0]->getConfigurationName()] = $row[0]->getConfigurationValue();
        }

        return new JsonResponse($configArr);
    }

}
