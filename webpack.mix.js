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

// mix.js(
//     [
//     'resources/assets/js/app.js',
//     'resources/assets/js/bootstrap.js',
//     ], 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix.copyDirectory('resources/assets/js/admin.js', 'public/js');
mix.copyDirectory('resources/assets/img', 'public/');
mix.copyDirectory('resources/assets/js/web.js', 'public/js');
mix.copyDirectory('resources/assets/js/ajax.js', 'public/js');

