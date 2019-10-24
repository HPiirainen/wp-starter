var gulp            = require('gulp');
var browserSync     = require('browser-sync').create();
var sass            = require('gulp-sass');
var sourcemaps      = require('gulp-sourcemaps');
var autoprefixer    = require('gulp-autoprefixer');
var cleancss		= require('gulp-clean-css');
var sort            = require('gulp-sort');
var imagemin        = require('gulp-imagemin');

var sassIn = './scss/**/*.scss';
var sassOut = './css/';
var vendorSassIn = ['scss/boot*.scss'];
var vendorSassIgnore = ['!scss/boot*.scss'];

/**
 * Task functionalities as named functions to avoid
 * "Starting anonymous"
 */
var watchTask = function() {
	gulp.watch(sassIn, gulp.series(sassTask));
};

var serveTask = function() {
	browserSync.init({
		files: [
			'{inc,template-parts}/**/*.php',
			'*.php'
		],
		proxy: 'http://wp-starter-test.localhost',
		open: 'local',
		browser: ['google chrome'],
		snippetOptions: {
			whitelist: ['/wp-admin/admin-ajax.php'],
			blacklist: ['/wp-admin/**']
		}
	});
};

var sassTask = function() {
	return gulp.src(['scss/*.scss'].concat(vendorSassIgnore))
		.pipe(sourcemaps.init())
		.pipe(sass({
			outputStyle: 'nested'
		})).on('error', sass.logError)
		.pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: false
        }))
        .pipe(cleancss())
        .pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(sassOut))
		.pipe(browserSync.stream({match: '**/*.css'}));
};

var vendorSassTask = function() {
	return gulp.src(vendorSassIn)
		.pipe(sourcemaps.init())
		.pipe(sass({ outputStyle: 'compressed' })).on('error', sass.logError)
        .pipe(sourcemaps.write('./'))
		.pipe(gulp.dest(sassOut));
};

var imagesTask = function() {
	return gulp.src('./images/*')
		.pipe(imagemin())
		.pipe(gulp.dest('./images'));
};

/**
 * Task definitions
 */
gulp.task('watch', gulp.series(watchTask));
gulp.task('serve', gulp.parallel(serveTask, watchTask));
gulp.task('sass', gulp.series(sassTask));
gulp.task('vendorsass', gulp.series(vendorSassTask));
gulp.task('images', gulp.series(imagesTask));
gulp.task('default', gulp.series(watchTask));
