<!DOCTYPE html>
<!--[if IE 8 ]>
<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php wp_title('|', true, 'right');?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<?php if (have_posts()) : ?>
		<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name') ?> Feed" href="<?php echo home_url() ?>/feed/">
	<?php endif; ?>

	<?php wp_head(); ?>

	<!--[if lt IE 9]>
	<script src="<?php echo CT_THEME_ASSETS ?>/bootstrap/js/html5shiv.js"></script>
	<script src="<?php echo CT_THEME_ASSETS ?>/bootstrap/js/respond.min.js"></script>
	<![endif]-->
    <script>
    jQuery(document).ready(function() {
      jQuery('.getcart').click(function(){
            jQuery('.cart-box').toggleClass('show');
        });
        jQuery('.searchclickbtn').click(function(){
            jQuery('.filter-options').toggleClass('show');
        });
        jQuery('.getloginform').click(function(){
            jQuery('#loginform').toggleClass('in');
            jQuery('#loginform').toggleClass('show');
        });
        jQuery('.modal .close').click(function(){
            jQuery(this).parent('.modal').removeClass('show');
        });
        jQuery('.search-form').focus(
            function(){
                jQuery(this).val('');
        });
        jQuery('.filter-options label').click(function(){
            if(jQuery(this).hasClass('active')){
                jQuery(this).removeClass('active');
            } 
            jQuery(this).addClass('active');
        });

    });
</script>
</head>
