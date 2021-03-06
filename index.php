<?php get_header();

//$wpdb->get_results("SELECT * FROM {$wpdb->prefix}users");
$wpdb->insert(
	"{$wpdb->prefix}options",
	array(
		'option_name' => 'webforce3333',
		'option_value' => 'Webforce 3',
		'autoload' => 'yes'
	),
	array(
		'%s',
		'%s',
		'%s'
	)
);

var_dump($wpdb);

echo __('Twenty Sixteen', 'webforce');
echo __('Ma chaine', 'webforce');

// On modifie la boucle par défaut de Wordpress
query_posts('order=ASC');
// On vérifie s'il y a des articles
if(have_posts()) :
	// On parcours chaque article
	while(have_posts()): the_post(); ?>
		<h2><?php the_title(); ?></h2>
		<div>
			<?php the_content(); ?>
		</div>
		<a href="<?php the_permalink(); ?>">Voir l'article</a>
	<?php endwhile;
else:
	echo "Il n'y a pas d'articles sur le blog.";
endif;
// On remet la boucle Wordpress par défaut
wp_reset_postdata();
?>

<?php get_footer(); ?>