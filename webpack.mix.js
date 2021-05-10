let mix = require('laravel-mix');

// mix.js('src/app.js', 'dist').setPublicPath('dist');


mix.js('resources/js/app.js', 'public/js').vue({ version: 2 });








mix.extract();

mix.disableNotifications();