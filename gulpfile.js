var gulp            = require('gulp');
var browserSync     = require('browser-sync').create();
var sass            = require('gulp-sass');
var sourcemaps      = require('gulp-sourcemaps');
var autoprefixer    = require('gulp-autoprefixer');
var cssnano			= require('gulp-cssnano');
var sort            = require('gulp-sort');
var imagemin        = require('gulp-imagemin');

var sassIn = './scss/**/*.scss';
var sassOut = './css/';
var vendorSassIn = ['scss/boot.scss'];
var vendorSassIgnore = ['!scss/boot.scss'];

gulp.task('default', ['watch']);

gulp.task('watch', function() {
	gulp.watch(sassIn, ['sass']);
});

gulp.task('serve', function() {

	browserSync.init({
		files: [
			'{inc,template-parts}/**/*.php',
			'*.php'
		],
		proxy: 'http://flo_starter.localhost',
		open: 'local',
		browser: ['google chrome'],
		snippetOptions: {
			whitelist: ['/wp-admin/admin-ajax.php'],
			blacklist: ['/wp-admin/**']
		}
	});

	gulp.watch(sassIn, ['sass']);

});

gulp.task('sass', function() {
	return gulp.src(['scss/*.scss'].concat(vendorSassIgnore))
		.pipe(sourcemaps.init())
		.pipe(sass({
			outputStyle: 'nested'
		})).on('error', sass.logError)
		.pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: false
        }))
        .pipe(cssnano(), {
	        safe: true
        })
        .pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(sassOut))
		.pipe(browserSync.stream({match: '**/*.css'}));
});

gulp.task('vendorsass', function() {
	return gulp.src(vendorSassIn)
		.pipe(sourcemaps.init())
		.pipe(sass({ outputStyle: 'compressed' })).on('error', sass.logError)
        .pipe(sourcemaps.write('./'))
		.pipe(gulp.dest(sassOut));
});

gulp.task('images', function() {
	return gulp.src('./images/*')
		.pipe(imagemin())
		.pipe(gulp.dest('./images'));
});