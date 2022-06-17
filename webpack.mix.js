const mix = require('laravel-mix');

mix.disableSuccessNotifications();


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

mix.js('resources/js/app.js', 'public/js');

mix.styles([
    'public/dark/css/nucleo-icons.css',
    'public/dark/css/black-dashboard.css',
    'public/dark/css/theme.css',
], 'public/css/app.css');
