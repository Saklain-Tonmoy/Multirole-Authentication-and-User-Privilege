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


// mix.scripts([
//     'node_modules/datatables.net/js/jquery.dataTables.min.js'
// ], 'public/js/dataTables.js');

mix.scripts([
    'node_modules/jquery/dist/jquery.min.js'
], 'public/js/jquery-for-dataTables-error-solution.js');


// mix.scripts([
//     'node_modules/admin-lte/plugins/pdfmake/pdfmake.js',
//     'node_modules/admin-lte/plugins/pdfmake/vfs_fonts.js',
//     'node_modules/admin-lte/plugins/jszip/jszip.js',

// ], 'public/js/datatables.js');