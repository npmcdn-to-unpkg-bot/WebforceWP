<?php get_header();

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
?>

<?php get_footer(); ?>