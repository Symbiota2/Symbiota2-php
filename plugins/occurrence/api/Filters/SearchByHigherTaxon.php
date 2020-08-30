<?php

namespace Occurrence\Filter;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\AbstractContextAwareFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Taxa\Entity\Ranks;
use Taxa\Entity\Relationships;
use Taxa\Entity\Taxa;

class SearchByHigherTaxon extends AbstractContextAwareFilter {
    public const NAME_KINGDOM = "kingdom";
    public const NAME_PHYLUM = "phylum";
    public const NAME_CLASS = "class";
    public const NAME_ORDER = "order";
    public const NAME_TRIBE = "tribe";

    public const VALID_PROPS = [
        SearchByHigherTaxon::NAME_KINGDOM,
        SearchByHigherTaxon::NAME_PHYLUM,
        SearchByHigherTaxon::NAME_CLASS,
        SearchByHigherTaxon::NAME_ORDER,
        SearchByHigherTaxon::NAME_TRIBE
    ];

    protected function filterProperty(string $property, $value, QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null) {
        if (!in_array($property, SearchByHigherTaxon::VALID_PROPS)) {
            return;
        }

        // Generate a unique parameter names to avoid collisions with other filters
        $parameterName = $queryNameGenerator->generateParameterName($property);
        $parameterValueName = $queryNameGenerator->generateParameterName("{$property}Value");

        $relationshipAlias = $queryNameGenerator->generateParameterName("{$property}Relation");
        $parentTaxonAlias = $queryNameGenerator->generateParameterName("{$property}Taxon");
        $parentRankAlias = $queryNameGenerator->generateParameterName("{$property}Rank");

        // Apply the filter
        $queryBuilder
            ->innerJoin(
                Relationships::class,
                $relationshipAlias,
                "WITH",
                $queryBuilder->expr()->eq(
                    "o.taxon",
                    "{$relationshipAlias}.taxaId"
                )
            )
            ->innerJoin(
                Taxa::class,
                $parentTaxonAlias,
                "WITH",
                $queryBuilder->expr()->eq(
                    "{$relationshipAlias}.parentTaxaId",
                    "{$parentTaxonAlias}.id"
                )
            )
            ->innerJoin(
                Ranks::class,
                $parentRankAlias,
                "WITH",
                $queryBuilder->expr()->eq(
                    "{$parentTaxonAlias}.rankId",
                    "{$parentRankAlias}.id"
                )
            )
            ->AndWhere(
                $queryBuilder->expr()->like(
                    "{$parentTaxonAlias}.scientificName",
                    ":{$parameterValueName}"
                )
            )
            ->AndWhere(
                $queryBuilder->expr()->eq(
                    "LOWER({$parentRankAlias}.rankName)",
                    "LOWER(:{$parameterName})"
                )
            )
            ->setParameter($parameterValueName, "{$value}%")
            ->setParameter($parameterName, $property);
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
