---
layout: default
---

### [Back to index](./index.html)

# AvailablePlugin object

* * *

**Property definitions**

| Name          | Value Type                | Required | Default |
|:--------------|:--------------------------|:---------|:--------|
| name          | string                    | Yes      |         |
| title         | string                    | Yes      |         |
| source        | string                    | Yes      |         |
| version       | string                    | Yes      |         |
| description   | string                    | No       |         |
| project_url   | string                    | No       |         |
| dependencies  | array&lt;string&gt;       | No       |         |

* * *

**Property descriptions**

- **name:** The plugin name.
- **title:** The title for the plugin, which is used in display.
- **source:** The url for the zip archive containing the plugin files.
- **version:** The current version of the plugin (in the format x.x.x).
- **description:** A description of the plugin.
- **project_url:** The url for the plugin documentation site.
- **dependencies:** An array of names of the plugins that are dependencies for the plugin.

* * *

### [Back to index](./index.html)
