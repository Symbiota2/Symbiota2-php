<?php

declare(strict_types=1);

namespace App\Operation;

use ApiPlatform\Core\Operation\PathSegmentNameGeneratorInterface;

/**
 * Generate a path name that uses the Entity name
 *
 * @author Curtis
 */
final class EntityPathSegmentNameGenerator implements PathSegmentNameGeneratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function getSegmentName(string $name, bool $collection = true): string
    {
        //$name = $this->dashize($name);

        return $collection ? $name : $name;
    }

    /* Left this in to easily customize with existing example */
    private function dashize(string $string): string
    {
        return strtolower(preg_replace('~(?<=\\w)([A-Z])~', '-$1', $string));
    }
}
