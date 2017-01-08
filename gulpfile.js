const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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

elixir(function (mix) {

    // CSS
    mix.copy("node_modules/bootstrap/dist/css/bootstrap.min.css", "public/css/");
    mix.copy("node_modules/admin-lte-express/public/admin-lte/css/AdminLTE.min.css", "public/css/");
    mix.copy("node_modules/admin-lte-express/public/admin-lte/css/skins/skin-blue.min.css", "public/css/");
    mix.copy("node_modules/font-awesome/css/font-awesome.min.css", "public/css/");
    mix.copy("node_modules/admin-lte-express/public/plugins/bootstrap-slider/slider.css", "public/css/");
    mix.copy("node_modules/admin-lte-express/public/plugins/iCheck/minimal/blue.css", "public/css/");
    mix.copy("node_modules/ionicons/dist/css/ionicons.min.css", "public/css/");
    mix.copy("resources/assets/css/app.css", "public/css/");

    // JavaScript
    mix.copy("node_modules/bootstrap/dist/js/bootstrap.min.js", "public/js/");
    mix.copy("node_modules/bootstrap/js/tooltip.js", "public/js/");
    mix.copy("node_modules/admin-lte-express/public/admin-lte/js/app.js", "public/js/admin-lte.min.js");
    mix.copy("node_modules/admin-lte-express/public/plugins/fastclick/fastclick.min.js", "public/js/");
    mix.copy("node_modules/admin-lte-express/public/plugins/bootstrap-slider/bootstrap-slider.js", "public/js/");
    mix.copy("node_modules/admin-lte-express/public/plugins/bootstrap-slider/bootstrap-slider.js", "public/js/");
    mix.copy("node_modules/admin-lte-express/public/plugins/sparkline/jquery.sparkline.min.js", "public/js/");
    mix.copy("node_modules/jquery/dist/jquery.min.js", "public/js/");
    mix.copy("node_modules/jquery/dist/jquery.slim.min.js", "public/js/");
    mix.copy("node_modules/jquery/dist/jquery.slim.min.js", "public/js/");
    //mix.copy("node_modules/map-icons/dist/js/map-icons.min.js", "public/js/");


    // Fontes
    mix.copy("node_modules/bootstrap/dist/fonts", "public/fonts/");
    mix.copy("node_modules/font-awesome/fonts", "public/fonts/");
    mix.copy("node_modules/ionicons/dist/fonts", "public/fonts/");
});
