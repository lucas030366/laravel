const mix = require('laravel-mix');

mix
	//.sass('resources/sass/app.scss', 'public/css')
	.sass('resources/sass/bootstrap.scss', 'public/css')
	.sass('resources/sass/mdb5.scss', 'public/css')

	//.js('resources/js/app.js', 'public/js')
	.js('resources/js/bootstrap.js', 'public/js')

	.browserSync({
		proxy: 'localhost:8000',
		port: 3000,
		open: false
	});
