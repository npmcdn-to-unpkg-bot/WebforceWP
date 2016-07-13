<?php

// Add custom header
$args = array(
	'width'  => 250,
	'height' => 250
);
add_theme_support('custom-header', $args);

// Add custom background
add_theme_support('custom-background');

// Add thumbnail
add_theme_support('post-thumbnails');

// Add menu
register_nav_menus(array(
	'main-menu' => 'Menu principal'
));

// Register our sidebars and widgetized areas
add_action('widgets_init', 'webforce_widgets_init');
function webforce_widgets_init(){
	register_sidebar(array(
		'name' => 'Sidebar',
		'id'   => 'sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>'
	));
}

// Charger le CSS
add_action('wp_enqueue_scripts', 'custom_styles');
function custom_styles(){
	// J'ajoute le style.css
	wp_register_style('style', get_template_directory_uri() . '/style.css', array(), time());
	wp_enqueue_style('style');
	// J'ajoute une balise style
	$color = get_option('webforce')['base_color'];
	$output = ".base-color {
		background-color: ".$color."
	}";
	wp_add_inline_style('style', $output);
}

// Charger le JS
add_action('wp_enqueue_scripts', 'custom_scripts');
function custom_scripts(){
	// On enlève le jQuery par défaut de WP
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/vendor/components/jquery/jquery.min.js', array(), time(), true);
	wp_enqueue_script('jquery');
	wp_register_script('script', get_template_directory_uri() . '/js/script.js', array(), time(), true);
	wp_enqueue_script('script');
}

// Personnaliser les couleurs du thème
function webforce_customize_register( $wp_customize )
{
    $wp_customize->add_setting('webforce[base_color]', array(
        'default'           => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'base_color', array(
        'label'    => __('Base color', 'webforce'),
        'section'  => 'colors',
        'settings' => 'webforce[base_color]'
    )));
}
add_action( 'customize_register', 'webforce_customize_register' );

add_action('init', 'custom_init');
function custom_init(){
	$args = array(
		'public' => true,
		'label'  => 'Portfolio',
		'labels' => array(
			'add_new_item' => 'Ajouter une référence',
		),
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail')
	);
	register_post_type('portfolio', $args);

	// On créé la taxonomy (catégorie custom) type de projet pour le portfolio
	register_taxonomy(
		'type',
		'portfolio',
		array(
			'label' => 'Type de projet'
		);
	);

	// Rafraîchis les permaliens
	flush_rewrite_rules();
}