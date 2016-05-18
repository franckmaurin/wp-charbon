# Charbon WP boilerplate

Boilerplate to use Wordpress with the latest good practices:

## New tree to isolate dependencies, content and theme src/dist
```
- wp/ (core of WP = peer dependency)
- wp-content/
  - themes/  (theme destination)
  - plugins/ (dependencies)
  - uploads/ (content)
- src/ (theme source)
```

Now you can easily:
* Manage WP core and plugins with Composer
* Manage build dependencies with NPM
* Build ES6/Sass stack with Webpack

## Install
You need to install composer, node and npm. After that, you can start a new project with:
```
composer install
npm install
npm run config
  prompt: Website URL:
  prompt: Theme Directory Name:
  prompt: DB Host:
  prompt: DB Name:
  prompt: DB User:
  prompt: DB Pass:
npm start

```
Note: after the WP install, don't forget to activate your theme and edit "Site Address (URL)" (remove "/wp") in the admin.

## Theme Features
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
* Copy the build in "wp-content/theme/theme_name"

## WP Plugins included
* CMB2 (for metaboxes and options)
* WP SEO
* WP Super Cache
* WP Migrate DB
