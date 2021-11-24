/**
 * Gulpfile Boilerplate
 *
 * @version 1.0.0
 * @package 'plugin-developer-boilerplate'
 */

const gulp   = require('gulp');
const sass   = require('gulp-sass')(require('sass'));
const minify = require('gulp-minify');
const rename = require('gulp-rename');

const scssFiles  = 'assets/scss/*.scss';
const cssMinDest = 'assets/css/';

const jsFiles   = 'assets/js_dev/*.js';
const jsMinDest = 'assets/js/';

const sassProdOptions = {
	outputStyle: 'compressed'
};

gulp.task('min_sass', function () {
	return gulp.src(scssFiles)
		.pipe(sass(sassProdOptions).on('error', sass.logError))
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest(cssMinDest));
});

gulp.task('min_js', function () {
	return gulp.src(jsFiles,{ allowEmpty: true })
		.pipe(minify({
			noSource: true,
			ext: {
				min: '.min.js'
			},
			ignoreFiles: ['*.min.js']
		}))
		.pipe(gulp.dest(jsMinDest));
});

gulp.task('watch', function () {
	gulp.watch(scssFiles, gulp.parallel('min_sass'));
	gulp.watch(jsFiles, gulp.parallel('min_js'));
});

gulp.task('default', gulp.parallel('min_sass','min_js'));
