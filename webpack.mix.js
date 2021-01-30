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
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.combine([
    'node_modules/jquery/dist/jquery.js'
    //here you can include more files to combine, or can combine ckeditor file here as well
    ],'public/js/jquery.js');

mix.js('resources/js/myckeditor.js', 'public/js/myckeditor.js');
