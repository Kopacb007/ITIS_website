// Include gulp
var gulp = require('gulp');
// include browser-sync
var browserSync = require('browser-sync').create();


// Static Server + watching files
gulp.task('serve', function() {

    browserSync.init({
    	//Make sure you have choosen only one of these
        // server: "./",
        proxy: "localhost:80"
    });

    gulp.watch("./*.html").on('change', browserSync.reload);
    gulp.watch("css/*.css").on('change', browserSync.reload);
    gulp.watch("js/*.js").on('change', browserSync.reload);
});

gulp.task('default', ['serve']);	
