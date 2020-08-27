<?php

namespace Occurrence\Filter;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\AbstractContextAwareFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use Doctrine\ORM\QueryBuilder;
use Taxa\Entity\Relationships;
use Taxa\Entity\Taxa;

class SearchByHigherTaxon extends AbstractContextAwareFilter {

    protected function filterProperty(string $property, $value, QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null) {
        if ($property !== "higherTaxon") {
            return;
        }

        // Generate a unique parameter name to avoid collisions with other filters
        $parameterName = $queryNameGenerator->generateParameterName($property);

        // Find all taxa who have a parent matching the given $value
        $em = $queryBuilder->getEntityManager();
        $qb = $em->createQueryBuilder();

        $higherTaxonResults = $qb
            ->select("r")
            ->from(Relationships::class, "r")
            ->innerJoin(
                Taxa::class,
                "pt",
                "WITH",
                $qb->expr()->eq("r.parentTaxaId", "pt.id")
            )
            ->where($qb->expr()->like("pt.scientificName", ":parentTaxon"))
            ->setParameter("parentTaxon", "{$value}%")
            ->getQuery()
            ->getResult();

        // We only need the tids
        $higherTaxonResults = array_map(function (Relationships $relationship) {
            return $relationship->getTaxaId()->getId();
        }, $higherTaxonResults);

        // If the array is empty, DQL syntax error
        if (count($higherTaxonResults) === 0) {
            $higherTaxonResults[] = 0;
        }

        // Apply the filter using found taxa
        $queryBuilder
            ->innerJoin(
                Taxa::class,
                $parameterName,
                "WITH",
                $queryBuilder->expr()->eq("o.taxon", "{$parameterName}.id")
            )
            ->where(
                $queryBuilder->expr()->in("{$parameterName}.id", $higherTaxonResults)
            );
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
                    'type' => 'query'
                ],
            ];
        }

        return $description;
    }
}
