<?php if (get_option('cx_g-sidebar-top') == 'true') { ?>
		<?php } else { ?>
			<?php get_template_part( 'inc/ad/ad-sidebar-top' ); ?>
		<?php } ?>
	
<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
		<?php else: ?>	 <?php get_template_part( 'inc/functions/jd' ); ?>
  <?php get_template_part( 'inc/functions/bj' ); ?>
  <?php get_template_part( 'inc/functions/tw' ); ?>
	<?php endif; ?>
<?php if (get_option('cx_g-sidebar-bot') == 'true') { ?>
		<?php } else { ?>
			<?php get_template_part( 'inc/ad/ad-sidebar-bot' ); ?>
		<?php } ?>
