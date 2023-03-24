# Neve Legacy Style Plugin

This plugin brings back the legacy style for Neve. The plugin enqueues the legacy style ahead of the current theme style, allowing the current theme style to override the legacy style.

## Generating the installation zip.
To generate the installation zip, run the following command:

```
npm install && composer install && npm run build:css && npm run dist
```
After that, you can get the installation zip from the `artifact` folder.
