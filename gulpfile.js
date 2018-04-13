var gulp            = require('gulp');
var browserSync     = require('browser-sync').create();
var sass            = require('gulp-sass');
var sourcemaps      = require('gulp-sourcemaps');
var autoprefixer    = require('gulp-autoprefixer');
var sort            = require('gulp-sort');
var imagemin        = require('gulp-imagemin');

var sassIn = './scss/**/*.scss';
var sassOut = './css/';

gulp.task('default', ['watch']);

gulp.task('watch', function() {
	gulp.watch(sassIn, ['sass']);
});

gulp.task('serve', function() {

	browserSync.init({
		proxy: 'http://flo_starter.localhost',
		open: false,
		browser: ['google chrome', 'firefox' , 'safari']
	});

	gulp.watch(sassIn, ['sass']);
	gulp.watch(['js/*.js', '**/*.php']).on('change', browserSync.reload);
		
});

gulp.task('sass', function() {
	return gulp.src('scss/main.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({ outputStyle: 'compressed' })).on('error', sass.logError)
		.pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: false
        }))
        .pipe(sourcemaps.write('./'))
		.pipe(gulp.dest(sassOut))
		.pipe(browserSync.stream());
});

gulp.task('vendorsass', function() {
	return gulp.src('scss/boot*.scss')
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