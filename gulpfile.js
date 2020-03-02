const gulp = require('gulp');

const autoprefixer = require('gulp-autoprefixer');
const beeper = require('beeper');
const browserSync = require('browser-sync').create();
const cleancss = require('gulp-clean-css');
const imagemin = require('gulp-imagemin');
const plumber = require('gulp-plumber');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const touch = require('gulp-touch-cmd');

const sassIn = './scss/**/*.scss';
const sassOut = './css/';
const vendorSassIn = ['scss/boot*.scss'];
const vendorSassIgnore = ['!scss/boot*.scss'];

/**
 * Task functionalities as named functions to avoid
 * "Starting anonymous"
 */
const watchTask = () => {
	return gulp.watch(sassIn, gulp.series(sassTask));
};

const serveTask = () => {
	return browserSync.init({
		files: [
			'{inc,template-parts}/**/*.php',
			'*.php'
		],
		proxy: 'http://flo_starter.localhost',
		snippetOptions: {
			whitelist: ['/wp-admin/admin-ajax.php'],
			blacklist: ['/wp-admin/**']
		}
	});
};

const sassTask = () => {
	return gulp.src(['scss/*.scss'].concat(vendorSassIgnore))
		.pipe(plumber(errorHandler))
		.pipe(sourcemaps.init())
		.pipe(sass({
			outputStyle: 'nested'
		}))
		.pipe(autoprefixer({
            cascade: false
        }))
        .pipe(cleancss())
        .pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(sassOut))
		.pipe(touch())
		.pipe(browserSync.stream({match: '**/*.css'}));
};

const vendorSassTask = () => {
	return gulp.src(vendorSassIn)
		.pipe(sourcemaps.init())
		.pipe(sass({ outputStyle: 'compressed' })).on('error', sass.logError)
        .pipe(sourcemaps.write('./'))
		.pipe(gulp.dest(sassOut));
};

const imagesTask = () => {
	return gulp.src('./images/*')
		.pipe(imagemin())
		.pipe(gulp.dest('./images'));
};

const errorHandler = () => beeper(3);

/**
 * Task definitions
 */
gulp.task('watch', gulp.series(watchTask));
gulp.task('serve', gulp.parallel(serveTask, watchTask));
gulp.task('sass', gulp.series(sassTask));
gulp.task('vendorsass', gulp.series(vendorSassTask));
gulp.task('images', gulp.series(imagesTask));
gulp.task('default', gulp.series(watchTask));
