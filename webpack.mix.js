const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .vue()


    mix.styles([
        'public/css/plugins/fontawesome-free/css/all.min.css',
        'public/css/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
        'public/css/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'public/css/plugins/jqvmap/jqvmap.min.css',
        'public/css/dist/css/adminlte.min.css',
        'public/css/dist/css/adminlte.min.css',
        'public/css/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
        'public/css/plugins/daterangepicker/daterangepicker.css',
        'public/css/plugins/summernote/summernote-bs4.min.css',

    ], 'public/css/all.css');






