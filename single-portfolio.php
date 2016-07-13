<?php get_header(); ?>

	<?php the_post(); ?>
	<div class="itemPortfolio">
		<h1><?php the_title(); ?></h1>
		<!-- Afficher tous les champs personnalisés -->
		<?php the_meta(); ?>
		<!-- Afficher un champ personnalisé -->
		<?php if(get_post_meta($post->ID, 'budget', true)){ ?>
			<p><strong>Budget</strong> : <?php echo get_post_meta($post->ID, 'budget', true); ?></p>
		<?php } ?>
		<?php if(get_post_meta($post->ID, 'client', true)){ ?>
			<p><strong>Client</strong> : <?php echo get_post_meta($post->ID, 'client', true); ?></p>
		<?php } ?>
		<div>
			<?php the_content(); ?>
		</div>
		<?php
		// Récupérer l'image => thumbnail, medium, large, full
		$src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>
		<img src="<?php echo $src; ?>" alt="<?php the_title(); ?>" />
	</div>

<?php get_footer(); ?>