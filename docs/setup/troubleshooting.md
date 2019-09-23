---
layout: default
---

### [Back to index](./index.html)

# Troubleshooting

The following are some common errors that have been encountered with installation and working with the 
development environment and how to fix them:

* * *
#### `error TS2307: Cannot find module...` after running `npm start`

If there is no `dist` directory in your Symbiota2 installation, or if this directory is empty, there was likely an
issue with the execution of `npm install` on your system. This could be from running the command as the root user
(or with sudo). To correct this either run `npm install` again not as the root user, or run `npm run package_all_plugins` to
build the plugins specifically.
 
* * *

### [Back to index](./index.html)
