var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var cssnano = require('gulp-cssnano');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var autoprefixer = require('gulp-autoprefixer');
var svgSprite = require('gulp-svg-sprite');

var paths = {};
  paths.assets =  './assets/';
  paths.dev = {
    sass: paths.assets + 'scss/**/*.scss',
    js: [
      paths.assets + 'js/scripts.js'
    ],
    svg: paths.assets + 'svg/*.svg'
  };
  paths.build = {
    css: paths.assets + 'css',
    js: paths.assets + 'js/build',
    svg: paths.assets + 'sprite'
  };

gulp.task('sass', function (done) {
  gulp.src(paths.dev.sass)
    .pipe(sass())
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(gulp.dest(paths.build.css))
    .pipe(cssnano())
    .pipe(rename({ extname: '.min.css' }))
    .pipe(gulp.dest(paths.build.css))
    .on('end', done);
});

gulp.task('scripts', function () {
  gulp.src(paths.dev.js)
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest(paths.build.js))
    .pipe(uglify())
    .pipe(rename({ extname: '.min.js' }))
    .pipe(gulp.dest(paths.build.js));
});

gulp.task('svg', function () {
  var svgConfig = {
    mode: {
      symbol: {
        dest: '',
        sprite: 'icons',
        inline: true
      }
    }
  };
  gulp.src(paths.dev.svg)
    .pipe(svgSprite(svgConfig))
    .pipe(gulp.dest(paths.build.svg));
});

gulp.task('watch', function () {
  gulp.watch(paths.dev.sass, ['sass']);
  gulp.watch(paths.dev.js, ['scripts']);
  gulp.watch(paths.dev.svg, ['svg']);
});



//Default watch for SASS and javascript updates
gulp.task('default', ['watch']);