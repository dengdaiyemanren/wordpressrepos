	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		<header class="entry-header">			<?php if ( is_single() ) : ?>			<h1 class="entry-title"><?php the_title(); ?></h1>			<?php else : ?>			<h1 class="entry-title">				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>			</h1>			<?php endif; ?>			<div class="meta-top1">				<div class="meta-top2">						<?php hmjblog_entry_meta(); ?>			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>				<div class="author-info">					<div class="author-avatar">						<?php						$author_bio_avatar_size = apply_filters( 'hmjblog_author_bio_avatar_size', 68 );						echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );						?>					</div>					<div class="author-description">						<h2><?php printf( __( 'About %s', 'hmjblog' ), get_the_author() ); ?></h2>						<p><?php the_author_meta( 'description' ); ?></p>						<div class="author-link">							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">							<?php printf( __( '显示作者所有文章 %s <span class="meta-nav">&rarr;</span>', 'hmjblog' ), get_the_author() ); ?>							</a>						</div>					</div>				</div>			<?php endif; ?>			</div>				<?php if ( comments_open() ) : ?>				<div class="comments-link">					<i class="fa fa-comments"></i><?php comments_popup_link('<span class="leave-reply">'.__('暂无评论','hmjblog').'</span>',__('1条评论','hmjblog' ), __( '%条评论', 'hmjblog')); ?>　<i class="fa fa-eye"></i><?php post_views('', '次浏览'); ?>				</div>			</div>		</header>			<?php endif; ?>			<div class="post-thumbnail">			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php if (  ! post_password_required() && ! is_attachment() && !is_single() ) :				the_post_thumbnail();			endif; ?></a>			</div>		<?php if ( !is_single() ) : ?>		<div class="entry-summary">			<?php the_excerpt() ?> 		</div>		<?php else : ?>		<div class="entry-content">			<?php the_content( __( '阅读全文 <span class="meta-nav">&rarr;</span>', 'hmjblog' ) ); ?>			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'hmjblog' ), 'after' => '</div>' ) ); ?>	<div class="post-link-share">		<div class="post-like">    			<a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" class="specsZan <?php if(isset($_COOKIE['specs_zan_'.$post->ID])) echo 'done';?>"><i class="fa fa-thumbs-o-up"></i>赞 <span class="count">        <?php if( get_post_meta($post->ID,'specs_zan',true) ){            		echo get_post_meta($post->ID,'specs_zan',true);                } else {					echo '0';				}?></span>    			</a>		</div>		<div class="bdsharebuttonbox">			<span class="share-hmj">　分享到：</span>			<a title="分享到新浪微博" class="bds_tsina fa fa-weibo" href="#" data-cmd="tsina"></a>			<a title="分享到QQ空间" class="bds_qzone fa fa-star" href="#" data-cmd="qzone"></a>			<a title="分享到腾讯微博" class="bds_tqq fa fa-tencent-weibo" href="#" data-cmd="tqq"></a>			<a title="分享到QQ好友" class="qq fa fa-qq" href="#" data-cmd="sqq" ></a>			<a title="分享到人人网" class="bds_renren fa fa-renren" href="#" data-cmd="renren"></a>			<a title="分享到微信" class="bds_weixin fa fa-weixin" href="#" data-cmd="weixin"></a>			<a class="bds_more fa fa-ellipsis-h" href="#" data-cmd="more"></a>		</div>	</div>		</div>		<?php endif; ?>	</article>