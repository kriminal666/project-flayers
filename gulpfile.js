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
    mix.sass('app.scss')
        .scripts([

            'libs/sweetalert-dev.js'
        ], './public/js/libs.js')

        .scripts([

            'libs/dropzone.js'
        ], './public/js/dropzone.js')

        .scripts([
            'libs/bootstrap.js'
        ], './public/js/bootstrap.js')

        .scripts([
            'libs/jquery-2.1.4.min.js'
        ], './public/js/jquery-2.1.4.min.js')

        .scripts([
            'libs/blueimp-gallery.min.js'
        ], './public/blueimp/js/blueimp-gallery.min.js')

        .scripts([
            'libs/jquery.blueimp-gallery.min.js'
        ], './public/blueimp/js/jquery.blueimp-gallery.min.js')

        .scripts([
            'libs/bootstrap-image-gallery.min.js'
        ], './public/blueimp/js/bootstrap-image-gallery.min.js')

        .styles([
            'libs/blueimp-gallery.min.css'
        ], './public/blueimp/css/blueimp-gallery.min.css')

        .styles([
            'libs/bootstrap-image-gallery.min.css'
        ], './public/blueimp/css/bootstrap-image-gallery.min.css')

        .styles([

            'libs/sweetalert.css'
        ], './public/css/libs.css')

        .styles([

            'libs/dropzone.css'
        ], './public/css/dropzone.css');


});
