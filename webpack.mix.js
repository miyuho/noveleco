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
    .sass('resources/sass/home.scss', 'public/css')
    .sass('resources/sass/login.scss', 'public/css')
    .sass('resources/sass/register.scss', 'public/css')
    .sass('resources/sass/article_show.scss', 'public/css')
    .sass('resources/sass/each_account.scss', 'public/css')
    
    .sass('resources/sass/profile_create.scss', 'public/css')
    .sass('resources/sass/profile_edit.scss', 'public/css')
    .sass('resources/sass/article_create.scss', 'public/css')
    .sass('resources/sass/article_edit.scss', 'public/css')
    .sass('resources/sass/admin_article.scss', 'public/css')
    .sass('resources/sass/mypage.scss', 'public/css')
    .sass('resources/sass/bookmark.scss', 'public/css')
    .sass('resources/sass/favorite.scss', 'public/css')
    .sass('resources/sass/account_config.scss', 'public/css')
    .version()

    .options({ processCssUrls: false });

if (mix.inProduction()) {
    mix.version();
}