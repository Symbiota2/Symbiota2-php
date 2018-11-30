<?php

namespace App\Transformers;

use App\Entities\Userroles;
use Flugg\Responder\Transformers\Transformer;

class UserrolesTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  \App\Entities\Userroles $userroles
     * @return array
     */
    public function transform(Userroles $userroles)
    {
        return [
            'userroleid' => (int) $userroles->getUserroleid(),
            'role' => (string) $userroles->getRole(),
            'tablepk' => (int) $userroles->getTablepk(),
            'secondaryvariable' => (string) $userroles->getSecondaryvariable(),
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'userroleid' => 'userroleid',
            'role' => 'role',
            'tablepk' => 'tablepk',
            'secondaryvariable' => 'secondaryvariable',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'userroleid' => 'userroleid',
            'role' => 'role',
            'tablepk' => 'tablepk',
            'secondaryvariable' => 'secondaryvariable',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
