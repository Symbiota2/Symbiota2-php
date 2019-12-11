<?php
namespace Core\Spatial\DBAL\Platform;

use Core\Spatial\DBAL\Types\AbstractSpatialType;
use Core\Spatial\PHP\Types\Geography\GeographyInterface;

/**
 * SQLite spatial platform
 *
 */
class SQLite extends AbstractPlatform
{
    /**
     * Gets the SQL declaration snippet for a field of this type.
     *
     * @param array $fieldDeclaration
     *
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration)
    {
        if ($fieldDeclaration['type']->getSQLType() === GeographyInterface::GEOGRAPHY) {
            return 'GEOMETRY';
        }

        return strtoupper($fieldDeclaration['type']->getSQLType());
    }

    /**
     * @param AbstractSpatialType $type
     * @param string              $sqlExpr
     *
     * @return string
     */
    public function convertToPHPValueSQL(AbstractSpatialType $type, $sqlExpr)
    {
        return sprintf('%s', $sqlExpr);
    }

    /**
     * @param AbstractSpatialType $type
     * @param string              $sqlExpr
     *
     * @return string
     */
    public function convertToDatabaseValueSQL(AbstractSpatialType $type, $sqlExpr)
    {
        return sprintf('%s', $sqlExpr);
    }
}
