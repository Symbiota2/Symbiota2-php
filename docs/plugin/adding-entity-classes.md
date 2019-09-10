---
layout: default
---

### [Back to index](./index.html)

# Adding Entity classes to the backend

**NOTE: If you are not planning on including new Entity classes in the backend components of your plugin, skip this page.**

**Before proceeding, be sure to have [setup your plugin for adding backend components](./backend-initial-setup.html).**

**The [Symfony documentation on creating Entity classes](https://symfony.com/doc/current/doctrine.html#creating-an-entity-class){:target="_blank"} 
  and the [API Platform documentation on mapping Entity classes](https://api-platform.com/docs/core/getting-started/#mapping-the-entities){:target="_blank"} 
  should be used as general references for creating new Entity classes and annotating them as API endpoints.**

To add a new Entity class to the backend components of your plugin, follow these steps:
- Create a new directory in the `api` directory of your plugin project and name it `Entity`. This directory will serve as the 
  directory for all further Entity classes added to the backend components of your plugin project.
- Create a new file in the `Entity` directory that you have just created and name it the name of the Entity class in pascal case.
- In the file that you have just created define the fully qualified namespace using the base namespace you have chosen for 
  your plugin.
- Name all properties and methods within the Entity class in camel case and define them according to the Symfony and 
  API Platform documentation.
- If you are going to expose this entity to the REST API using the `@ApiResource` annotation, and the name of the entity 
  is different than the plugin name, then the `routePrefix` attribute should be added to the `@ApiResource` annotation and 
  assigned the value of `/<plugin-name>` (replacing `<plugin-name>` with the name of your plugin).
- An example Entity class with two properties (`id` and `exampleField`) and the relevant getter and setter methods would 
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
 *     collectionOperations={"get"}
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

- Using the above example, the root folder for the plugin project within the `plugins` folder of the Symbiota2 installation 
    would have a structure resembling the following after these steps have been completed:
    ```
    plugins
    │   ...
    └───example-plugin
    │   │   config.json
    │   └───api
    │       └───Entity
    │           │   ExampleEntity.php
    │   
    │   ...
    ```

### [Back to index](./index.html)
