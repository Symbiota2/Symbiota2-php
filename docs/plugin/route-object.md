---
layout: default
---

### [Back to index](./index.html)

# Route object

* * *

**Property definitions**

| Name          | Value Type                                           | Required | Default |
|:--------------|:-----------------------------------------------------|:---------|:--------|
| path          | string                                               | Yes      |         |
| redirectTo    | string                                               | No       |         |
| provider      | string                                               | No       |         |
| data          | object                                               | No       |         |
| children      | array&lt;[ChildRoute](./child-route-object.html)&gt; | No       |         |

* * *

**Property descriptions**

- **path:** The child route path.
- **redirectTo:** The path of the route that should be redirected to.
- **provider:** The provider for the component that the path, or redirect path, are routed to (defined within the module of the plugin).
- **data:** A data object that is to be passed to the component that the path, or redirect path, are routed to.
- **children:** An array of child routes that should be added to this route.

* * *

### [Back to index](./index.html)
