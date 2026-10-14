<?php

/**
 * Fonctions du thème Ty Birill.
 */

const TYBIRILL_VERSION = '1.1.0';

/**
 * Fonctionnalités du thème et emplacements de menus.
 */
function tybirill_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['script', 'style', 'gallery', 'caption']);

    register_nav_menus([
        'header' => 'Menu entête',
        'footer' => 'Menu footer',
    ]);
}
add_action('after_setup_theme', 'tybirill_setup');

/**
 * Version d'un fichier compilé : sa date de modification, pour invalider
 * le cache navigateur à chaque build.
 */
function tybirill_asset_version(string $file): string
{
    $path = get_theme_file_path($file);

    return file_exists($path) ? (string) filemtime($path) : TYBIRILL_VERSION;
}

/**
 * Styles et scripts.
 *
 * Les dépendances sont déclarées pour garantir l'ordre de chargement
 * (GSAP avant ScrollTrigger, les deux avant le script du thème).
 * La version du fichier compilé sert à invalider le cache navigateur.
 */
function tybirill_assets(): void
{
    wp_enqueue_style('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css', [], null);
    wp_enqueue_style(
        'tybirill',
        get_theme_file_uri('dist/css/style.min.css'),
        ['swiper'],
        tybirill_asset_version('dist/css/style.min.css')
    );

    wp_enqueue_script('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js', [], null, true);
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', [], null, true);
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', ['gsap'], null, true);
    wp_enqueue_script(
        'tybirill',
        get_theme_file_uri('dist/js/all.min.js'),
        ['swiper', 'gsap', 'gsap-scrolltrigger'],
        tybirill_asset_version('dist/js/all.min.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'tybirill_assets');

/**
 * Charge le script du thème en module ES.
 */
function tybirill_module_script(string $tag, string $handle): string
{
    if ('tybirill' === $handle) {
        $tag = str_replace('<script ', '<script type="module" ', $tag);
    }

    return $tag;
}
add_filter('script_loader_tag', 'tybirill_module_script', 10, 2);

/**
 * Les champs WYSIWYG ACF sont affichés sans paragraphes automatiques.
 */
remove_filter('acf_the_content', 'wpautop');

/**
 * Éditeur classique pour tous les types de contenu (le site repose sur ACF).
 */
add_filter('use_block_editor_for_post_type', '__return_false');

/**
 * Page d'options « Pizzeria » (Réglages > Pizzeria).
 */
require_once __DIR__ . '/options/pizzeria.php';
PizzeriaMenuPage::register();
