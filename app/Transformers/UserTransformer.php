<?php

namespace App\Transformers;

use App\Entities\User;
use Flugg\Responder\Transformers\Transformer;

class UserTransformer extends Transformer
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
     * @param  \App\Entities\User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'uid' => (int) $user->getUid(),
            'username' => (string) $user->getUsername(),
            'firstname' => (string) $user->getFirstname(),
            'middleinitial' => (string) $user->getMiddleinitial(),
            'lastname' => (string) $user->getLastname(),
            'title' => (string) $user->getTitle(),
            'institution' => (string) $user->getInstitution(),
            'department' => (string) $user->getDepartment(),
            'address' => (string) $user->getAddress(),
            'city' => (string) $user->getCity(),
            'state' => (string) $user->getState(),
            'zip' => (string) $user->getZip(),
            'country' => (string) $user->getCountry(),
            'email' => (string) $user->getEmail(),
            'url' => (string) $user->getUrl(),
            'biography' => (string) $user->getBiography(),
            'ispublic' => (bool) $user->getIspublic(),
            //'lastlogindate' => (string) date("Y-m-d H:i:s", strtotime($user->getLastlogindate())),
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'uid' => 'uid',
            'username' => 'username',
            'firstname' => 'firstname',
            'middleinitial' => 'middleinitial',
            'lastname' => 'lastname',
            'title' => 'title',
            'institution' => 'institution',
            'department' => 'department',
            'address' => 'address',
            'city' => 'city',
            'state' => 'state',
            'zip' => 'zip',
            'country' => 'country',
            'email' => 'email',
            'url' => 'url',
            'biography' => 'biography',
            'ispublic' => 'ispublic',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'uid' => 'uid',
            'username' => 'username',
            'firstname' => 'firstname',
            'middleinitial' => 'middleinitial',
            'lastname' => 'lastname',
            'title' => 'title',
            'institution' => 'institution',
            'department' => 'department',
            'address' => 'address',
            'city' => 'city',
            'state' => 'state',
            'zip' => 'zip',
            'country' => 'country',
            'email' => 'email',
            'url' => 'url',
            'biography' => 'biography',
            'ispublic' => 'ispublic',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
