/**
 * 
 *  BASE GULPFILE
 * 
 */

// require gulp
  source = "web/app/themes/themetybirill/";
  proxy = "http://localhost/TyBirill/web/";
  
  const {src,dest,watch,series} = require("gulp");
  const sass = require("gulp-sass")(require("sass"));
  const postcss = require("gulp-postcss");
  const autoprefixer = require("gulp-autoprefixer");
  const cssnano = require("cssnano");
  const sourcemaps = require('gulp-sourcemaps');
  const rename = require("gulp-rename");
  const uglify = require("gulp-uglify");
  const clean = require("gulp-strip-import-export");
  const concat = require("gulp-concat");
  const browserSync = require("browser-sync").create();

// Sass Task
function scssTask() {
  return src(source + "sass/**/*scss", { sourcemaps: true })
    .pipe(sass())
    .pipe(
      autoprefixer({
        // browsers: ["> 1%", "last 2 versions"],
        cascade: false,
      })
    )
    .pipe(dest(source + "sass"))
    .pipe(postcss([cssnano()]))
    .pipe(rename({ suffix: ".min" }))
    .pipe(dest(source + "dist/css", { sourcemaps: "." }));
};

// Script Task
function scriptTask() {
  return src(source + "js/**/*js", { sourcemaps: true })
    .pipe(sourcemaps.init())
    .pipe(clean())
    .pipe(concat('all.js'))
    .pipe(uglify())
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write('.'))
    .pipe(dest(source + "dist/js/"));
};

// Images Task

// Browsersync Tasks
function browsersyncServe(cb) {
  browserSync.init({
    proxy: proxy,
  });
  cb();
}

function browsersyncReload(cb) {
  browserSync.reload();
  cb();
}

// Watch Task
function watchTask() {
  watch(source + "**/*php", browsersyncReload);
  watch(
    [source + "sass/**/*scss", source + "js/**/*js"],
    series(scssTask, scriptTask, browsersyncReload)
  );
}

// Default Gulp Task
exports.default = series(
  scssTask,
  scriptTask,
  browsersyncServe,
  watchTask
)