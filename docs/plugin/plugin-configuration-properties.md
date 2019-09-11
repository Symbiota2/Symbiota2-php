---
layout: default
---

### [Back to index](./index.html)

# Plugin configuration properties

* * *

**Property definitions**

| Name            | Value Type                                                 | Required | Default |
|:----------------|:-----------------------------------------------------------|:---------|:--------|
| name            | string                                                     | Yes      |         |
| title           | string                                                     | Yes      |         |
| source          | string                                                     | No       |         |
| version         | string                                                     | Yes      |         |
| description     | string                                                     | No       |         |
| project_url     | string                                                     | No       |         |
| dependencies    | array&lt;string&gt;                                        | No       |         |
| api_namespace   | string                                                     | No       |         |
| ui_filename     | string                                                     | No       |         |
| ui_module_name  | string                                                     | No       |         |
| ui_routes       | array&lt;[Route](./route-object.html)&gt;                  | No       |         |
| tab_hooks       | array&lt;[TabHook](./tab-hook-object.html)&gt;             | No       |         |
| component_hooks | array&lt;[ComponentHook](./component-hook-object.html)&gt; | No       |         |
| link_hooks      | array&lt;[LinkHook](./link-hook-object.html)&gt;           | No       |         |

* * *

**Property descriptions**

- **name:** The plugin name.
- **title:** The title for the plugin, which is used in display.
- **source:** The url for the zip archive containing the plugin files.
- **version:** The current version of the plugin (in the format x.x.x).
- **description:** A description of the plugin.
- **project_url:** The url for the plugin documentation site.
- **dependencies:** An array of names of the plugins that are dependencies for the plugin.
- **api_namespace:** The namespace used for the backend classes of the plugin. It is highly suggested to use the
    plugin name in pascal case for this value to ensure that no namespace conflicts occur.
- **ui_filename:** The file within the plugin zip archive that is the packaged umd file for containing the frontend 
    elements of the plugin.
- **ui_module_name:** The name of the module containing the frontend elements of the plugin.
- **ui_routes:** An array of routes that should be added to the Symbiota2 installation when this plugin is activated.
- **tab_hooks:** An array of tab outlet hooks that should be added to the Symbiota2 installation when this plugin is activated.
- **component_hooks:** An array of component outlet hooks that should be added to the Symbiota2 installation when this plugin is activated.
- **link_hooks:** An array of link hooks that should be added to the Symbiota2 installation when this plugin is activated.

* * *

### [Back to index](./index.html)
