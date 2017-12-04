var gulp = require('gulp');
var postcss      = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var sass = require('gulp-sass');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var gulpif = require('gulp-if');
var webpack = require('webpack-stream');

var processors = [
    autoprefixer({
        browsers: ['last 4 versions'],
        cascade: false
    })
];

gulp.task('sass', function(){
    return gulp.src('src/style/**/*.scss')
        .pipe(plumber(function(error){
            var args = Array.prototype.slice.call(arguments);
            notify.onError({
                title: 'Compile Error',
                message: '<%= error.message %>',
                sound: 'Submarine'
            }).apply(this, args);
            this.emit('end');
        }))
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(postcss(processors))
        .pipe(gulp.dest('prod/style'))
});

gulp.task('watch-sass', function(){
    gulp.watch('src/style/**/*.scss', ['sass']);
});

gulp.task('webpack', function(){
    gulp.src('src/js')
        .pipe(plumber(function(error){
            var args = Array.prototype.slice.call(arguments);
            notify.onError({
                title: 'Compile Error',
                message: '<%= error.message %>',
                sound: 'Submarine'
            }).apply(this, args);
            this.emit('end');
        }))
        .pipe(webpack(require('./webpack.config.js')))
        .pipe(gulp.dest('prod/js'));
});

gulp.task('watch-webpack', function(){
    gulp.watch('src/js/**/*.js', ['webpack']);
});

gulp.task('watch', ['watch-webpack', 'watch-sass']);