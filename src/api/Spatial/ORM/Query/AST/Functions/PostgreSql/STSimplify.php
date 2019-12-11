<?php

namespace Core\Spatial\ORM\Query\AST\Functions\PostgreSql;

use Core\Spatial\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_Buffer DQL function
 */
class STSimplify extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_Simplify';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
