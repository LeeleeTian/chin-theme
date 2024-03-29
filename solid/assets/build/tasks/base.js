var gulp     = require('gulp'),
    lib      = require('./../lib');

var TaskBase = function(key, options, config) {
 	this._prefix = ''
 	this._message = ''
 	this._key = this._prefix + key
 	this._config = config
 	this._as = null
 	this._to = null
 	this._watch = false
}

TaskBase.prototype.init = function () {

}

TaskBase.prototype.as = function(as) {
    this._as = as;
    return this;
}

TaskBase.prototype.watch = function () {
    if (this._options.production) {
        return this
    }

	var watchFiles = lib.pathKey(this._key, this._config),
		additionalFiles = lib.pathKey('watch.' + this._key, this._config);

	if (additionalFiles) {
		watchFiles = watchFiles.concat(additionalFiles);
    }

	gulp.watch(watchFiles, [this._key])
	return this
}

TaskBase.prototype.message = function(message) {
    this._message = message;
    return this;
}

TaskBase.prototype.determineTarget = function(to) {
    if (to.startsWith('$')) {
        return to.substring(1)
    }
    return this._config.asset_path + to
}

module.exports = exports = TaskBase;
