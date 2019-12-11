<?php

namespace Core\Spatial\ORM\Query\AST\Functions\PostgreSql;

use Core\Spatial\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_Buffer DQL function
 */
class STTransform extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_Transform';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
