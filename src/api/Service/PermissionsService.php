<?php

namespace Core\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class PermissionsService
{
    /*private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    public function addPermissionGranted(string $permission): string
    {
        $currentPermissions = $this->params->get('currentPermissions');
        if(!in_array($permission, $currentPermissions)) {
            $currentPermissions[] = $permission;
        }
        $this->params->set('currentPermissions',$currentPermissions);
        return true;
    }*/
}
