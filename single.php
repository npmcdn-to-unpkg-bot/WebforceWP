<?php get_header(); ?>

	<?php the_post();
	// Si la sidebar est active,
	// Je mets une class col70
	if(is_active_sidebar('sidebar')){ ?>
		<div class="col70">
	<?php }else{ ?>
		<div>
	<?php } ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	<?php if(is_active_sidebar('sidebar')){ ?>
		<div class="col30">
			<?php dynamic_sidebar('sidebar'); ?>
		</div>
		<div class="clear"></div>
	<?php } ?>

<?php get_footer(); ?>