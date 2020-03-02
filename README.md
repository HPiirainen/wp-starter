## flo_starter WordPress theme

### Install dependencies

* `yarn`

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
* `images`
  * simply optimizes theme images