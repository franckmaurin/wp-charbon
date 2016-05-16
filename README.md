# Charbon WP boilerplate

Boilerplate to use Wordpress with the latest best practices:

* Isolate dependencies (core and plugins), content, and our source code
* Building automatisation with Webpack
* Sass and ES6 stack

## Install
You need to install composer, node and npm. After that, you can start a new project with :
```
npm run create
  "Init the boilerplate"
  "Website URL:" *url*
  "Theme name:" *name*
  "DB host:" *dbhost*
  "DB name:" *dbname*
  "DB user:" *dbuser*
  "DB password:" *dbpass*
```
Note: after the WP install, don't forget to activate your theme and edit the location of wordpress (add '/wp') in the admin.

## Features
### Easy management of data model
* Custum post types
* Meta boxes
* Theme options

### Themes
* Cleanup the DOM and useless libraries)
* BEM classnames (menu, body, post, page)
* Share social
* HTML5 History and animate

### Building with Webpack
* Styles with Sass/Susy/Breakpoint
* Scripts with ES6/Babel
* Copy the build in the theme location

## WP Plugins included
* CMB2 (for metaboxes and options)
* WP SEO
* WP Super Cache
* WP Migrate DB

