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
    public const VALID_PROPS = [
        SearchByHigherTaxon::NAME_KINGDOM,
        SearchByHigherTaxon::NAME_PHYLUM,
        SearchByHigherTaxon::NAME_CLASS,
        SearchByHigherTaxon::NAME_ORDER
    ];

    protected function filterProperty(string $property, $value, QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null) {
        if (!in_array($property, SearchByHigherTaxon::VALID_PROPS)) {
            return;
        }

        // Generate a unique parameter name to avoid collisions with other filters
        $parameterName = $queryNameGenerator->generateParameterName($property);

        // Find valid children
        $em = $queryBuilder->getEntityManager();
        $higherTaxonResults = $this->getChildrenForTaxon(
            $em,
            $property,
            $value
        );

        // If we feed the next query an empty array we get an error
        $higherTaxonResults = (
            count($higherTaxonResults) > 0 ?
            $higherTaxonResults :
            [""]
        );

        // Apply the filter using found taxa
        $queryBuilder
            ->innerJoin(
                Taxa::class,
                $parameterName,
                "WITH",
                $queryBuilder->expr()->eq("o.taxon", "{$parameterName}.id")
            )
            ->AndWhere(
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

    /**
     * Find the taxonIDs of all taxa who have a parent matching the given
     * $taxonSciName
     * @param EntityManagerInterface $em The entity manager for building Queries
     * @param string $parentRank The rank of the parent taxon
     * @param string $parentSciName The scientific name to find children for
     * @return array Array of taxonIDs that are children of $taxonSciName
     */
    private function getChildrenForTaxon(
        EntityManagerInterface $em,
        string $parentRank,
        string $parentSciName): array {

        $qb = $em->createQueryBuilder();

        $taxaRelations = $qb->select("r")->from(Relationships::class, "r")
            ->innerJoin(
                Taxa::class,
                "pt",
                "WITH",
                $qb->expr()->eq("r.parentTaxaId", "pt.id")
            )
            ->innerJoin(
                Ranks::class,
                "pr",
                "WITH",
                $qb->expr()->eq("pt.rankId", "pr.id")
            )
            ->where($qb->expr()->eq("LOWER(pr.rankName)", "LOWER(:parentRank)"))
            ->andWhere($qb->expr()->like("pt.scientificName", ":parentTaxon"))
            ->setParameter("parentRank", $parentRank)
            ->setParameter("parentTaxon", "{$parentSciName}%")
            ->getQuery()
            ->getResult();

        return array_map(function (Relationships $relation) {
            // Return the ID of the child taxon for each relation
            return $relation->getTaxaId()->getId();
        }, $taxaRelations);
    }
}
