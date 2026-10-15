/**
 * Gulp : compilation SCSS et JS du thème Ty Birill.
 *
 *   npm run dev     à chaque sauvegarde : SCSS compilé dans sass/style.css et
 *                   injecté dans la page ; un .js ou .php recharge la page.
 *   npm run build   CSS et JS minifiés dans dist/, à lancer avant de commiter.
 *
 * L'adresse du site local est lue dans WP_HOME du fichier .env.
 */

const { src, dest, watch, series, parallel } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const rename = require("gulp-rename");
const uglify = require("gulp-uglify");
const stripImportExport = require("gulp-strip-import-export");
const concat = require("gulp-concat");
const sourcemaps = require("gulp-sourcemaps");
const browserSync = require("browser-sync").create();
const fs = require("fs");

const theme = "web/app/themes/themetybirill/";

// Adresse du site servi par MAMP, lue dans le .env de Bedrock
function localUrl() {
  try {
    const env = fs.readFileSync(".env", "utf8");
    const match = env.match(/^WP_HOME=['"]?([^'"\r\n]+)/m);
    if (match) return match[1];
  } catch (e) {}
  return "http://localhost/tybirill/web";
}

/* ---------- Développement ---------- */

// SCSS -> sass/style.css, injecté dans le navigateur sans recharger la page
function devStyles() {
  return src(theme + "sass/style.scss")
    .pipe(sourcemaps.init())
    .pipe(sass().on("error", sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(sourcemaps.write("."))
    .pipe(dest(theme + "sass"))
    .pipe(browserSync.stream({ match: "**/*.css" }));
}

/* ---------- Mise en ligne ---------- */

// SCSS -> dist/css/style.min.css
function styles() {
  return src(theme + "sass/style.scss", { sourcemaps: true })
    .pipe(sass().on("error", sass.logError))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(rename({ suffix: ".min" }))
    .pipe(dest(theme + "dist/css", { sourcemaps: "." }));
}

// Modules ES -> un seul fichier dist/js/all.min.js
function scripts() {
  return src([theme + "js/modules/*.js", theme + "js/main.js"])
    .pipe(sourcemaps.init())
    .pipe(stripImportExport())
    .pipe(concat("all.js"))
    .pipe(uglify())
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write("."))
    .pipe(dest(theme + "dist/js/"));
}

// Lancer BrowserSync
function serve(cb) {
  browserSync.init({ proxy: localUrl(), open: true, notify: false });
  cb();
}

// Recharger la page dans BrowserSync
function reload(cb) {
  browserSync.reload();
  cb();
}

// Surveiller les fichiers et recharger la page
function watchFiles() {
  watch(theme + "sass/**/*.scss", devStyles);
  watch([theme + "js/**/*.js", theme + "**/*.php"], reload);
}

// Exporter les tâches
exports.styles = styles;
exports.scripts = scripts;
exports.build = parallel(styles, scripts);
exports.dev = series(devStyles, serve, watchFiles);
exports.default = exports.dev;