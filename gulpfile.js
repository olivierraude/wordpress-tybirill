/**
 * Gulp : compilation SCSS et JS du thème Ty Birill.
 *
 *   npx gulp build   compile une fois (avant un déploiement)
 *   npx gulp         compile, lance BrowserSync et surveille les fichiers
 *
 * L'URL locale du site est lue dans la variable d'environnement WP_HOME
 * (comme dans le .env de Bedrock), sinon http://localhost:3000.
 */

const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const rename = require('gulp-rename');
const uglify = require('gulp-uglify');
const stripImportExport = require('gulp-strip-import-export');
const concat = require('gulp-concat');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();

const theme = 'web/app/themes/themetybirill/';
const proxy = process.env.WP_HOME || 'http://localhost:3000';

// SCSS -> dist/css/*.min.css
function styles() {
  return src(theme + 'sass/**/*.scss', { sourcemaps: true })
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest(theme + 'dist/css', { sourcemaps: '.' }));
}

// Modules ES -> un seul fichier dist/js/all.min.js
function scripts() {
  return src([theme + 'js/modules/*.js', theme + 'js/main.js'])
    .pipe(sourcemaps.init())
    .pipe(stripImportExport())
    .pipe(concat('all.js'))
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(dest(theme + 'dist/js/'));
}

function serve(cb) {
  browserSync.init({ proxy });
  cb();
}

function reload(cb) {
  browserSync.reload();
  cb();
}

function watchFiles() {
  watch(theme + '**/*.php', reload);
  watch(theme + 'sass/**/*.scss', series(styles, reload));
  watch(theme + 'js/**/*.js', series(scripts, reload));
}

const build = parallel(styles, scripts);

exports.styles = styles;
exports.scripts = scripts;
exports.build = build;
exports.default = series(build, serve, watchFiles);
