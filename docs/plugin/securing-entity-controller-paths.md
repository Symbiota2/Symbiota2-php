---
layout: default
---

### [Back to index](./index.html)

# Securing Entity and Controller class paths in the API

**NOTE: If you are not planning on adding security to the Entity or Controller classes in the backend components of your plugin, skip this page.**

**Before proceeding, be sure to have [added the Entity classes to the backend of your plugin](./adding-entity-classes.html) 
  or have [added the Controller classes to the backend of your plugin](./adding-controller-classes.html).**

**The [Symfony documentation on adding security to Controller classes](https://symfony.com/doc/current/security.html#denying-access-roles-and-other-authorization){:target="_blank"} 
  and the [API Platform documentation on adding security to Entity classes](https://api-platform.com/docs/core/security/){:target="_blank"} 
  should be used as general references for adding security.**
  
* * *

To add security to an Entity class in the backend components of your plugin, follow these steps:
- Add the `access_control` attribute and assign its value using the following format (replacing `<permission-name>` with 
  the name of the permission level you would like to limit access to):
  
  ```
  "access_control"="is_granted('<permission-name>')"
  ```
  
- An example Entity class with access to its POST operations limited to users with the `SuperAdmin` permission would 
  resemble the following:

```php
<?php

namespace ExamplePlugin\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * ExampleEntity
 *
 * @ORM\Table(name="example_entity", indexes={@ORM\Index(name="index_example_field", columns={"example_field"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/example-plugin",
 *     itemOperations={"get"},
 *     collectionOperations={
 *         "get",
 *         "post"={
 *             "access_control"="is_granted('SuperAdmin')"
 *         } 
 *     }
 * )
 */
class ExampleEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="example_field", type="string", length=45)
     */
    private $exampleField;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExampleField(): ?string
    {
        return $this->exampleField;
    }

    public function setExampleField(string $exampleField): self
    {
        $this->exampleField = $exampleField;

        return $this;
    }

}
```

* * *

To add security to a Controller method in the backend components of your plugin, follow these steps:
- Add the `@IsGranted` annotation to the method using the following format (replacing `<permission-name>` with 
  the name of the permission level you would like to limit access to):
  
  ```
  @IsGranted("<permission-name>")
  ```
  
- An example Controller class with access to the method `postExampleMethod` limited to users with the `SuperAdmin` permission would 
  resemble the following:

```php
<?php

namespace ExamplePlugin\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class ExampleController extends AbstractController
{
    /**
     * @Route(
     *     name="get-example",
     *     path="/api/example-plugin/get-example",
     *     methods={"GET"}
     * )
     */
    public function getExampleMethod()
    {
        // Method code here
    }

    /**
     * @Route(
     *     name="post-example",
     *     path="/api/example-plugin/post-example",
     *     methods={"POST"}
     * )
     * @IsGranted("SuperAdmin")
     */
    public function postExampleMethod(Request $request)
    {
        // Method code here
    }
}
```

* * *

### [Back to index](./index.html)
