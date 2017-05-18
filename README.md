## Theme_name WordPress theme

### Getting started

* search for `theme_name` globally and fix to reflect theme name

### Install dependencies

* `npm install`

### Gulp tasks

* `watch`
  * watches for changes in `scss/` and runs `gulp sass` automatically
  * `gulp` defaults to `gulp watch`
* `serve`
  * opens a Browser-sync node server for local and external testing
  * watches for file changes
  * modify `proxy` to correct URL
* `vendorsass`
  * run to compile vendor SCSS files
  * for example `bootstrap.scss`
* `pot`
  * creates theme language template file into `languages`
  * *untested*
* `images`
  * simply optimizes theme images