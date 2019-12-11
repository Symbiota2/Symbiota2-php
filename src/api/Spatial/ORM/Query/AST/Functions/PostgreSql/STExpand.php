<?php

namespace Core\Spatial\ORM\Query\AST\Functions\PostgreSql;

use Core\Spatial\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_Buffer DQL function
 */
class STExpand extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_Expand';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
