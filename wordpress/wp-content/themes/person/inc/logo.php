<?php if (get_option('cx_title') == 'logo') { ?>
	<hgroup class="logo-main"><h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1></hgroup>
<?php } else { ?>
<hgroup class="logo-main">
	<div class="title-main">
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	</div>
</hgroup>
<?php } ?>