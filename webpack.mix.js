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
   .sass('resources/sass/app.scss', 'public/css');

mix.scripts([
	'node_modules/jquery/dist/jquery.min.js',
	'node_modules/datatables.net/js/jquery.dataTables.min.js',
	'resources/js/manutencao.js'
], 'public/js/all.js');

mix.styles([
	'node_modules/datatables.net-dt/css/jquery.dataTables.min.css'
], 'public/css/all.css');