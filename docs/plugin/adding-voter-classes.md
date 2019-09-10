---
layout: default
---

### [Back to index](./index.html)

# Adding Voter classes to the backend

**NOTE: If you are not planning on including new Voter classes in the backend components of your plugin, skip this page.**

**Before proceeding, be sure to have [setup your plugin for adding backend components](./backend-initial-setup.html).**

**The [Symfony documentation on creating Voter classes](https://symfony.com/doc/current/security/voters.html#creating-the-custom-voter){:target="_blank"} 
  should be used as a general reference for creating new Voter classes.**

To add a new Voter class to the backend components of your plugin, follow these steps:
- Create a new directory in the `api` directory of your plugin project and name it `Security`. This directory will serve as the 
  directory for all further Voter classes added to the backend components of your plugin project.
- Create a new file in the `Security` directory that you have just created and name it the name of the Voter class in pascal case.
- In the file that you have just created define the fully qualified namespace using the base namespace you have chosen for 
  your plugin.
- Name all properties and methods within the Controller class in camel case and define them according to the Symfony documentation.
- New Voter classes must implement the `supports` and `voteOnAttribute` abstract methods of the Symfony Voter class.
- The implementation of the `supports` abstract method must define the permission attribute which activates the class.
- The implementation of the `voteOnAttribute` abstract method must perform the following actions:
  - Verify the user matches an instance of the Users Entity in the Core namespace (or, in other words, verify the user is in the database).
  - Iterate through all of the roles for the user from the UserRoles Entity in the Core namespace.
  - For each role determine if the role matches the permission attribute for which the class was activated or one of a 
    higher level which would override the class activated permission attribute, if there is a match do the following:
    -  Set the `$vote` property to `true`.
    -  Call the `addCurrentPermissions` method of the Users Entity in the Core namespace (via the `TokenInterface`), and 
       pass it the role as an argument.
- An example Voter class would resemble the following:

```php
<?php

namespace ExamplePlugin\Security;

use Core\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class ExampleAdminVoter extends Voter
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    protected function supports($attribute, $subject)
    {
        return ($attribute === 'ExampleAdmin');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $vote = false;

        if(!$token->getUser() instanceof Users) {
            return false;
        }

        $authenticatedUserId = $token->getUser()->getId();
        $q = $this->em->createQuery('SELECT ur FROM Core\Entity\UserRoles ur WHERE ur.userId = '.$authenticatedUserId);
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $role = $row[0]->getRole();
            if($role === 'SuperAdmin') {
                $token->getUser()->addCurrentPermissions('SuperAdmin');
                $vote = true;
            }
            if($role === 'ExampleAdmin') {
                $token->getUser()->addCurrentPermissions('ExampleAdmin');
                $vote = true;
            }
        }

        return $vote;
    }

}
```

- Using the above example, the root folder for the plugin project within the `plugins` folder of the Symbiota2 installation 
    would have a structure resembling the following after these steps have been completed:
    ```
    plugins
    │   ...
    └───example-plugin
    │   │   config.json
    │   └───api
    │       └───Security
    │           │   ExampleAdminVoter.php
    │   
    │   ...
    ```

### [Back to index](./index.html)
