var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        'animate.css',
        'bootstrap.min.css',
        'font-awesome.min.css',
        'main.css',
        'prettyPhoto.css',
        'price-range.css',
        'responsive.css',
    ]);
});

elixir(function(mix) {
    mix.scripts([
        'bootstrap.min.js',
        'contact.js',
        'gmaps.js',
        'html5shiv.js',
        'jquery.prettyPhoto.js',
        'jquery.scrollUp.min.js',
        'main.js',
        'price-range.js',
    ]);
});

elixir(function(mix) {
    mix.version(['css/all.css', 'js/all.js']);
});

elixir(function(mix) {
    mix.copy('resources/assets/fonts', 'public/build/fonts');
});