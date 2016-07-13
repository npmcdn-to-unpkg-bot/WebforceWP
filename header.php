<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(bloginfo('name').'-'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="container"> <!-- start .container -->
	<header class="base-color">
		<div class="col50" style="color:#<?php header_textcolor(); ?>">
			<h2><?php bloginfo('name'); ?></h2>
			<p><?php bloginfo('description'); ?></p>
			<?php if(get_custom_header()->url){ ?>
				<img class="logo" src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" />
			<?php } ?>
		</div>
		<?php wp_nav_menu(array(
			'theme_location' => 'main-menu',
			'container_class' => 'col50'
		)); ?>
		<div class="clear"></div>
	</header>