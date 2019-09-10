---
layout: default
---

### [Back to index](./index.html)

# Adding Controller classes to the backend

**NOTE: If you are not planning on including new Controller classes in the backend components of your plugin, skip this page.**

**Before proceeding, be sure to have [setup your plugin for adding backend components](./backend-initial-setup.html).**

**The [Symfony documentation on creating Controller classes](https://symfony.com/doc/current/controller.html){:target="_blank"} 
  should be used as a general reference for creating new Controller classes and mapping them to url paths.**

To add a new Controller class to the backend components of your plugin, follow these steps:
- Create a new directory in the `api` directory of your plugin project and name it `Controller`. This directory will serve as the 
  directory for all further Controller classes added to the backend components of your plugin project.
- Create a new file in the `Controller` directory that you have just created and name it the name of the Controller class in pascal case.
- In the file that you have just created define the fully qualified namespace using the base namespace you have chosen for 
  your plugin.
- Name all properties and methods within the Controller class in camel case and define them according to the Symfony documentation.
- If you are going to map a method within the Controller class to a url, use the following format for the url path
  (replacing `<plugin-name>` with the name of your plugin and `<method-path>` with the desired path name of your method):
  
  ```
  /api/<plugin-name>/<method-path>
  ```
  
- An example Controller class with two methods mapped to urls, one being a GET method, `getExampleMethod`, and the other 
  being a POST method, `postExampleMethod`, would resemble the following:

```php
<?php

namespace ExamplePlugin\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

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
     */
    public function postExampleMethod(Request $request)
    {
        // Method code here
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
    │       └───Controller
    │           │   ExampleController.php
    │   
    │   ...
    ```

### [Back to index](./index.html)
