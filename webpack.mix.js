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


mix.scripts([
    'node_modules/datatables.net/js/jquery.dataTables.min.js'
], 'public/js/dataTables.js');

// mix.scripts([
//     'node_modules/jquery/dist/jquery.min.js'
// ], 'public/js/jquery.js');


// mix.scripts([
//     'node_modules//jquery/dist/jquery.min.js',
//     'node_modules/datatables.net/js/jquery.dataTables.min.js',
//     'node_modules/datatables.net-buttons/js/dataTables.buttons.min.js',
//     'node_modules/datatables.net-buttons/js/buttons.html5.min.js',
//     'node_modules/datatables.net-buttons/js/buttons.print.min.js',
//     'node_modules/jszip/dist/js/jszip.min.js',
//     'node_modules/jszip/dist/js/jszip.min.js',
//     'node_modules/pdfmake/build/pdfmake.min.js',

// ], 'public/js/datatables.js');