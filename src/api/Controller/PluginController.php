<?php

namespace Core\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class PluginController extends AbstractController
{
    private $em;
    private $params;

    public function __construct(
        EntityManagerInterface $em,
        ParameterBagInterface $params
    )
    {
        $this->em = $em;
        $this->params = $params;
    }

    /**
     * @Route(
     *     name="plugin_configurations",
     *     path="/api/pluginconfigurations",
     *     methods={"GET"}
     * )
     */
    public function getPluginConfigurations()
    {
        $fileContents = '';
        $rootDir = $this->params->get('kernel.project_dir');
        if(file_exists($rootDir.'/config/plugin-config.json')) {
            $fileContents = file_get_contents($rootDir.'/config/plugin-config.json');
        }

        return new Response($fileContents);
    }

    /**
     * @Route(
     *     name="plugin_registry",
     *     path="/api/pluginregistry",
     *     methods={"GET"}
     * )
     */
    public function getPluginRegistry()
    {
        $fileContents = '';
        $rootDir = $this->params->get('kernel.project_dir');
        if(file_exists($rootDir.'/symbiota2-plugin-registry.json')) {
            $fileContents = file_get_contents($rootDir.'/symbiota2-plugin-registry.json');
        }

        return new Response($fileContents);
    }

}
