<?php

namespace Occurrence\Filter;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\AbstractContextAwareFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use Doctrine\ORM\QueryBuilder;
use Taxa\Entity\Relationships;
use Taxa\Entity\Taxa;

class SearchByTaxon extends AbstractContextAwareFilter {

    protected function filterProperty(string $property, $value, QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null) {
        if ($property !== "higherTaxon") {
            return;
        }

        // Generate a unique parameter name to avoid collisions with other filters
        $parameterName = $queryNameGenerator->generateParameterName($property);

        // Find all taxa who have a parent matching the given $value
        $em = $queryBuilder->getEntityManager();
        $higherTaxonResults = $em->createQueryBuilder()
            ->select("r")
            ->from(Relationships::class, "r")
            ->innerJoin(Taxa::class, "pt", "WITH", "pt.id = r.parentTaxaId")
            ->where("pt.scientificName LIKE :parentTaxon")
            ->setParameter("parentTaxon", "{$value}%")
            ->getQuery()
            ->getResult();

        $higherTaxonResults = array_map(function (Relationships $relationship) {
            return $relationship->getTaxaId()->getId();
        }, $higherTaxonResults);

        // Apply the filter using found taxa
        $queryBuilder
            ->innerJoin(Taxa::class, $parameterName, "WITH", "o.taxon = {$parameterName}.id")
            ->where($queryBuilder->expr()->in("{$parameterName}.id", $higherTaxonResults));
    }

    public function getDescription(string $resourceClass): array {
        if (!$this->properties) {
            return [];
        }

        $description = [];
        foreach ($this->properties as $property => $strategy) {
            $description["$property"] = [
                'property' => $property,
                'type' => 'string',
                'required' => false,
                'swagger' => [
                    'description' => 'Return all occurrences with a parent matching the given taxon',
                    'name' => 'Higher taxonomy',
                    'type' => 'TEST',
                ],
            ];
        }

        return $description;
    }
}
