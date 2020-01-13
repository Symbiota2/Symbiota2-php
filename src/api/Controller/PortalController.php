<?php

namespace Core\Controller;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class PortalController extends AbstractController
{
    private $application;

    public function __construct(
        KernelInterface $kernel
    )
    {
        $this->application = new Application($kernel);
        $this->application->setAutoExit(false);
    }

    /**
     * @Route(
     *     name="update_database",
     *     path="/api/updatedatabase",
     *     methods={"POST"}
     * )
     * @IsGranted("SuperAdmin")
     * @return JsonResponse
     */
    public function updateDatabase(): JsonResponse
    {
        $diffInput = new ArrayInput([
            'command' => 'doctrine:migrations:diff'
        ]);
        try {
            $this->application->run($diffInput);
        } catch (\Exception $e) {
            return new JsonResponse(
                false
            );
        }
        $migrationInput = new ArrayInput([
            'command' => 'doctrine:migrations:migrate'
        ]);
        try {
            $this->application->run($migrationInput);
        } catch (\Exception $e) {
            return new JsonResponse(
                false
            );
        }
        return new JsonResponse(
            true
        );
    }
}
