<?php

//** ACTIONS */
// Permettent d'ajouter et la prise en compte de fonctionnalités de Wordpress
// Ajout du support du titre et des menus 

function montheme_supports()
{
  add_theme_support('title-tag');
  add_theme_support('menus');
  add_theme_support('post-thumbnails');

  register_nav_menu('header', 'Menu entête');
  register_nav_menu('footer', 'Menu footer');
}

//** Ajout des packages CSS et JS, possibilité d'ajout de dépendences -> Popper & de numéro de version & de placer les scripts dans le footer -> wp_register_scripts [pas de dépendances], pas de version,placer dans le footer. */ 

function montheme_register_assets()
{
  // wp_register_style('locomotiveCSS', get_stylesheet_directory_uri() . '/sass/locomotive-scroll.css');
  // wp_register_style('swiperCSS', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
  wp_register_style('swiperCSS', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css');
  // wp_register_style('monstyle', get_stylesheet_directory_uri() . '/sass/style.css');
  wp_register_style('monstyle', get_stylesheet_directory_uri() . '/dist/css/style.min.css');

  // wp_register_script('locomotiveScroll', get_stylesheet_directory_uri() . '/js/locomotive-scroll.min.js', [], false, true);
  wp_register_script('swiperJS', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js', [], false, true);
  wp_register_script('scrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', [], false, true);
  wp_register_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', [], false, true);
  // wp_register_script('monscript', get_stylesheet_directory_uri() . '/js/main.js', [], false, true);
  wp_register_script('monscript', get_stylesheet_directory_uri() . '/dist/js/all.min.js', [], false, true);




  // wp_enqueue_style('locomotiveCSS');
  wp_enqueue_style('swiperCSS');
  wp_enqueue_style('monstyle');

  wp_enqueue_script('swiperJS');
  // wp_enqueue_script('locomotiveScroll');
  wp_enqueue_script('gsap');
  wp_enqueue_script('scrollTrigger');
  wp_enqueue_script('monscript');
}


//** FILTERS */
// Permettent d'afficher des données de Wordpress sur les pages du site

// Prise en compte, affichage et modification du titre
function montheme_title()
{
}

// Retire les paragraphes créés par ACF
function acf_wysiwyg_remove_wpautop()
{
  // remove p tags //
  remove_filter('acf_the_content', 'wpautop');
  // add line breaks before all newlines //
  // add_filter('acf_the_content', 'nl2br');
}


//TODO -> Ajout du plugin Classic Editor dans Composer
// Désactivation de Gutenberg
function disable_gutenberg_editor()
{
  return false;
}

add_action('after_setup_theme', 'montheme_supports');
add_action('wp_enqueue_scripts', 'montheme_register_assets');
// add_action('acf/init', 'acf_wysiwyg_remove_wpautop');
remove_filter('acf_the_content', 'wpautop');

add_filter('wp-title', 'montheme_title');
add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");

// Ajout type=>module au script
add_filter("script_loader_tag", "add_module_to_my_script", 10, 3);
function add_module_to_my_script(
  $tag,
  $handle,
  $src
) {
  if ("monscript" === $handle) {
    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
  }

  return $tag;
}

require_once('options/pizzeria.php');
PizzeriaMenuPage::register();



//** SHORTCODES **//

// Swiper Carousel \\
/*
function my_swiper() {

	$images = get_field('images');
	$videos = get_field('videos');

	?>
	<div class='container-slider swiper mySwiper' id='swiper-1'>
		<div class='swiper-wrapper'>
			<?php
				foreach((array)$images as $image) {
					if($image) {
			?>
						<div class='img-about swiper-slide'>
							<img src="<?php echo $image; ?>">
						</div>
					
			<?php }
			} 	foreach((array)$videos as $video) {
					if($video) {
			?>
						<div class='swiper-slide'>
							<video controls><source src="<?php echo $video; ?>"/></video>
						</div>
					
			<?php 	} 
			}
			?>
		</div>
    <div class='swiper-button-next'></div>
    <div class='swiper-button-prev'></div>
	</div>
	<!-- <div class='swiper-pagination'></div> -->
<?php
}

add_shortcode('swiper_carousel','my_swiper');
*/