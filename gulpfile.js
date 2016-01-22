var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var minifyCss = require('gulp-cssnano');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var autoprefixer = require('gulp-autoprefixer');

var paths = {
  dev: {
    sass: './theme_files/assets/styles/scss/**/*.scss',
    js: []
  },
  build {
    css: './theme_files/assets/styles',
    js: './theme_files/assets/scripts/build'
  }
};

gulp.task('sass', function(done) {
  gulp.src(paths.dev.sass)
    .pipe(sass())
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(gulp.dest(paths.build.css))
    .pipe(cssnano())
    .pipe(rename({ extname: '.min.css' }))
    .pipe(gulp.dest(paths.build.css))
    .on('end', done);
});

gulp.task('scripts', function() {
  gulp.src(paths.dev.js)
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest(paths.build.js))
    .pipe(uglify())
    .pipe(rename({ extname: '.min.js' }))
    .pipe(gulp.dest(paths.build.js));
});

gulp.task('watch', function() {
  gulp.watch(paths.dev.sass, ['sass']);
  gulp.watch(paths.dev.js, ['scripts']);
});



//Default watch for SASS and javascript updates
gulp.task('default', ['watch']);