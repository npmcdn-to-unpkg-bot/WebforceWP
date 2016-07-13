<?php get_header(); ?>

<?php
// On modifie la boucle par défaut de Wordpress
//query_posts('post_type=portfolio&order=ASC');
// On vérifie s'il y a des articles
if(have_posts()) :
	// On parcours chaque article
	$count = 1;
	$total = $wp_query->post_count;
	$display = 3;
	$allTerms = get_terms('type', array('hide_empty'=>1));
	echo "<ul>";
	foreach($allTerms as $allTerm){
		echo "<li class='itemClick' data-slug='".$allTerm->slug."'>".$allTerm->name."</li>";
	}
	echo "</ul>";
	echo "<div class='grid'>";
	while(have_posts()): the_post();
		$terms = get_the_terms($post->ID, 'type');
		$output = "";
		foreach($terms as $term){
			$output .= $term->slug.' ';
		}
		?>
		<div class="item col<?php echo floor(100/$display); ?> itemPortfolio <?php echo $output; ?>">
			<h2><?php the_title(); ?></h2>
			<?php
			// Récupérer l'image => thumbnail, medium, large, full
			$src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium')[0]; ?>
			<img src="<?php echo $src; ?>" alt="<?php the_title(); ?>" />
			<div>
				<?php the_content(); ?>
			</div>
			<a href="<?php the_permalink(); ?>">Voir l'article</a>
			<?php echo $count; ?>
		</div>
		<?php if($count % $display == 0 || $count == $total){ ?>
			<div class="clear"></div>
		<?php } ?>
		<?php $count++;
	endwhile;
	echo "</div>";
else:
	echo "Il n'y a pas d'articles sur le blog.";
endif;
// On remet la boucle Wordpress par défaut
//wp_reset_postdata();
?>

<?php get_footer(); ?>