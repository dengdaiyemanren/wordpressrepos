<?php if ( get_post_meta($post->ID, 'thumbnail', true) ) : ?>
<?php $image = get_post_meta($post->ID, 'thumbnail', true); ?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php echo catch_image() ?>"  alt="<?php the_title(); ?>" class="home-thumbnail hidden-xs" />
</a>
<?php else: ?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" class="home-thumbnail hidden-xs">

<?php if (has_post_thumbnail()) { the_post_thumbnail('home-thumb', array('alt' => get_the_title()));
} else { ?>
<img  src="<?php echo catch_image() ?>"  alt="<?php the_title(); ?>" />
<?php } ?></a>
<?php endif; ?>