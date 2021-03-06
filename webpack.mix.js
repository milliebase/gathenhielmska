const mix = require('laravel-mix');

require('dotenv').config();

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your WordPlate application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JavaScript files.
 |
 */

const theme = process.env.WP_THEME;

mix.setResourceRoot('../');
mix.setPublicPath(`public/themes/${theme}/assets`);

mix.copyDirectory('resources/images', `public/themes/${theme}/assets/images`);

mix.js('resources/scripts/app.js', 'scripts');
mix.sass('resources/styles/app.scss', 'styles');

let settings = { proxy: process.env.PROXY };

if (process.env.PROXY_PORT) {
  settings = {
    proxy: process.env.PROXY,
    port: process.env.PROXY_PORT,
   };
}

mix.browserSync(settings);
