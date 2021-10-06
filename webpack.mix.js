const mix = require('laravel-mix')

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

mix.copyDirectory('resources/backend', 'public/backend')
mix.copyDirectory('resources/frontend', 'public/frontend')

mix
	.js('resources/js/admin/app.js', 'public/js/admin')
	.js('resources/js/user/app.js', 'public/js/user')
	.sass('resources/sass/app.scss', 'public/css');
