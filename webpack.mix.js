let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix
.js("resources/assets/js/app.js", "public/js")
.scripts(
  [
    "resources/assets/libs/js/jquery/jquery-3.1.1.min.js",
    "resources/assets/libs/js/bootstrap/popper.min.js",
    "resources/assets/libs/js/bootstrap/bootstrap.min.js",
    "resources/assets/libs/js/bootstrap/mdb.min.js",
    "resources/assets/libs/plugins/velocity/velocity.min.js",
    "resources/assets/libs/plugins/velocity/velocity.ui.min.js",
    "resources/assets/libs/plugins/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js",
    "resources/assets/libs/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js",
    "resources/assets/libs/plugins/jquery_visible/jquery.visible.min.js",
    "resources/assets/libs/js/misc/ie10-viewport-bug-workaround.js",
    "resources/assets/libs/js/misc/holder.min.js",
    "resources/assets/libs/plugins/easypiechart/jquery.easypiechart.min.js",
    "resources/assets/libs/js/scripts.js",
    "resources/assets/libs/js/custom.js"
    
  ],
  "public/js/fiml.js"
)
.styles(
  [
    "resources/assets/libs/fonts/batch-icons/css/batch-icons.css",
    "resources/assets/libs/fonts/font-awesome/css/font-awesome.css",
    "resources/assets/libs/css/bootstrap/bootstrap.min.css",
    "resources/assets/libs/css/bootstrap/mdb.min.css",
    "resources/assets/libs/plugins/custom-scrollbar/jquery.mCustomScrollbar.min.css",
    "resources/assets/libs/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css",
    "resources/assets/libs/css/hamburgers/hamburgers.css",
    "resources/assets/libs/css/fiml/fiml.css"
  ],
  "public/css/styles.css"
);
