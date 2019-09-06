---
layout: default
---

### [Back to index](./index.html)

# TabHook object

* * *

**Property definitions**

| Name          | Value Type  | Required | Default |
|:--------------|:------------|:---------|:--------|
| outlet        | string      | Yes      |         |
| tab_text      | string      | No       |         |
| index         | number      | No       |         |
| module        | string      | No       |         |
| provider      | string      | No       |         |
| component     | any         | No       |         |

* * *

**Property descriptions**

- **outlet:** The tab hook outlet within Symbiota2 that this hook should connect to.
- **tab_text:** The text that should appear in the tab.
- **index:** Numeric sort order value this tab should receive when being sorted with other tabs in the same outlet.
- **module:** The module within this plugin in which the component for this tab is declared in.
- **provider:** The provider for the component of the tab (defined within the module of the plugin).
- **component:** Can only be assigned value within the actual outlet component (and not within the config file). 
    Used to load default components for a specific outlet.

* * *

### [Back to index](./index.html)
