# Charbon WP boilerplate

Boilerplate to use Wordpress with the latest good practices:

* Isolate dependencies (core and plugins), content, and theme source code
* Upgrade WP and plugins with Composer
* Building with Webpack
* Sass and ES6 stack

## Install
You need to install composer, node and npm. After that, you can start a new project with:
```
composer install
npm install
npm run configurate
  prompt: Website URL:
  prompt: Theme Directory Name:
  prompt: DB Host:
  prompt: DB Name:
  prompt: DB User:
  prompt: DB Pass:
npm start

```
Note: after the WP install, don't forget to activate your theme and edit the location of wordpress (add '/wp') in the admin.

## Features
### Easy management of data model
* Custum post types
* Meta boxes
* Theme options

### Themes
* Cleanup the DOM and useless libraries
* BEM classnames (menu, body, post, page)
* Share in social networks
* HTML5 History and animate

### Building with Webpack
* Styles with Sass/Susy/Breakpoint
* Scripts with ES6/Babel
* Copy the build in "wp-content/theme/themename"

## WP Plugins included
* CMB2 (for metaboxes and options)
* WP SEO
* WP Super Cache
* WP Migrate DB

