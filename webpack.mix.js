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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

//     resources/admin/

mix.styles([
    'resources/admin/assets/bootstrap/css/bootstrap.min.css',
    'resources/admin/assets/font-awesome/4.5.0/css/font-awesome.min.css',
    'resources/admin/assets/ionicons/2.0.1/css/ionicons.min.css',
    'resources/admin/assets/dist/css/AdminLTE.min.css',
    'resources/admin/assets/dist/css/skins/_all-skins.min.css',
    'resources/admin/assets/plugins/datatables/dataTables.bootstrap.css',
    'resources/admin/assets/plugins/iCheck/all.css',
    'resources/admin/assets/plugins/datepicker/datepicker3.css',
    'resources/admin/assets/plugins/select2/select2.min.css',
    'resources/admin/stylesForAdminPanel.css',
], 'public/css/admin.css');

mix.scripts([
    'resources/admin/assets/plugins/jQuery/jquery-2.2.3.min.js',
    'resources/admin/assets/bootstrap/js/bootstrap.min.js',
    'resources/admin/assets/plugins/slimScroll/jquery.slimscroll.min.js',
    'resources/admin/assets/plugins/fastclick/fastclick.js',
    'resources/admin/assets/dist/js/app.min.js',
    'resources/admin/assets/dist/js/demo.js',
    'resources/admin/assets/plugins/datatables/jquery.dataTables.min.js',
    'resources/admin/assets/plugins/datatables/dataTables.bootstrap.min.js',
    'resources/admin/assets/plugins/select2/select2.full.min.js',
    'resources/admin/assets/plugins/datepicker/bootstrap-datepicker.js',
    'resources/admin/assets/plugins/iCheck/icheck.min.js',
    'resources/admin/scriptsForAdminPanel.js',
], 'public/js/admin.js');

mix.copyDirectory('resources/admin/assets/dist/fonts', 'public/fonts');

//blog

mix.styles([
    'resources/blog/css/animate.min.css',
    'resources/blog/css/bootstrap.min.css',
    'resources/blog/css/font-awesome.min.css',
    'resources/blog/css/owl.carousel.css',
    'resources/blog/css/owl.theme.css',
    'resources/blog/css/owl.transitions.css',
    'resources/blog/css/responsive.css',
    'resources/blog/css/style.css',
], 'public/css/blog.css');

mix.scripts([


    'resources/blog/js/jquery-1.11.3.min.js',
    'resources/blog/js/bootstrap.min.js',
    'resources/blog/js/jquery.stickit.min.js',
    // 'resources/blog/js/map.js',
    'resources/blog/js/menu.js',
    'resources/blog/js/owl.carousel.min.js',
    'resources/blog/js/scripts.js',

    // '/node_modules/jquery/dist/jquery.js',
], 'public/js/blog.js');


mix.copyDirectory('resources/blog/fonts', 'public/fonts');
mix.copyDirectory('resources/blog/images', 'public/img');

