<?php

namespace App\PathResolver;

use ApiPlatform\Core\PathResolver\OperationPathResolverInterface;
use Doctrine\Common\Inflector\Inflector;

final class CurtPathNameResolver implements OperationPathResolverInterface
{
    public function resolveOperationPath(string $resourceShortName, array $operation, bool $collection) : string
    {
        $path = strtolower($resourceShortName);
        if (!$collection) {
            $path .= '/{id}';
        }
        $path .= '.{_format}';

        return $path;
    }
}