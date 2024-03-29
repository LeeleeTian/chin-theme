var BaseTask = require('./base'),
    gulp     = require('gulp'),
    plumber       = require('gulp-plumber'),
    less          = require('gulp-less'),
    autoprefixer  = require('gulp-autoprefixer'),
    minifycss     = require('gulp-clean-css'),
    rename        = require('gulp-rename'),
    notify        = require('gulp-notify'),
    livereload    = require('gulp-livereload'),
    sourcemaps    = require('gulp-sourcemaps'),
    gulpif        = require('gulp-if'),

    lib      = require('./../lib');

    var bless = require('gulp-bless');

var SolidLess = function (key, options, config) {
    this._prefix = 'less.'
    this._message = 'Less compiled'
    this._key = this._prefix + key
    this._config = config
    this._options = options
    this._as = null
    this._to = null
}

SolidLess.prototype = new BaseTask;
SolidLess.prototype.constructor = SolidLess

SolidLess.prototype.to = function(to) {
    var self = this
    this._to = to
    var target = this.determineTarget(to)

    gulp.task(self._key, function () {
        return gulp.src(lib.pathKey(self._key, self._config))
                    // .pipe(plumber({errorHandler: lib.onError}))
                        .pipe(less())
                        .pipe(rename(self._as))
                        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 2'))
                        .pipe(minifycss())
                        .pipe(bless())
                    .pipe(gulp.dest(target))
                    .pipe(gulpif(!self._options.production, livereload()))
                    .pipe(gulpif(!self._options.production, notify({ message: self._message })));
    });

    return this
}

module.exports = exports = SolidLess;
