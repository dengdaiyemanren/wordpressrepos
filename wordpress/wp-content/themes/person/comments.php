<?php
if ( post_password_required() ) {
	return;
}
?>

<?php
  $numPingBacks = 0;
  $numComments  = 0;
  foreach ($comments as $comment)
  if (get_comment_type() != "comment") $numPingBacks++; else $numComments++;
?><!-- 引用 -->
<div id="comments" class="comments-area" name="comments">
	<?php if ( have_comments() ) : ?>
	<h2 class="comments-title">
		<?php $my_email = get_bloginfo ( 'admin_email' );
			$str = "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_post_ID = $post->ID 
			AND comment_approved = '1' AND comment_type = '' AND comment_author_email";echo $wpdb->get_var("$str != '$my_email'");?>条评论
	</h2>
<!-- 显示正在加载新评论 -->
 <div id="loading-comments"><span>评论加载中，请稍等...</span></div>
	<ul class="commentlist">
		<?php wp_list_comments( 'type=comment&callback=mytheme_comment' ); ?>
	</ul><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	
		<nav class="comment-nav"><?php paginate_comments_links('prev_text=上一页&next_text=下一页'); ?></nav>
	
	<?php endif; // Check for comment navigation. ?>
<?php else:?><h2 class="comments-title">
		抢沙发
	</h2>
	<?php endif; // have_comments() ?>
	<?php if ( comments_open() ) : ?>
	<div id="respond" class="comment-respond row">
		


			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		
				<?php if ( $user_ID ) : ?>
				<div class="welcomediv col-md-12 col-xs-12">
					<?php echo get_avatar( get_the_author_email(), '32' ); ?>
					登录者：<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>
					<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出"><?php print ' 退出'; ?></a>
				</div>
					<?php elseif ( '' != $comment_author ): ?>
					<div class="welcomediv">
						<?php echo get_avatar($comment_author_email, $size = '32');  ?>
						<?php printf ('欢迎 <strong>%s</strong>', $comment_author); ?> 再次光临
						<a href="javascript:toggleCommentAuthorInfo();" id="toggle-comboxinfo"> 修改信息</a>
						<script type="text/javascript" charset="utf-8">
							//<![CDATA[
							var changeMsg = " 修改信息";
							var closeMsg = " 关闭";
							function toggleCommentAuthorInfo() {
								jQuery('#comboxinfo').slideToggle('slow', function(){
									if ( jQuery('#comboxinfo').css('display') == 'none' ) {
									jQuery('#toggle-comboxinfo').text(changeMsg);
									} else {
									jQuery('#toggle-comboxinfo').text(closeMsg);
									}
								});
							}
							jQuery(document).ready(function(){
								jQuery('#comboxinfo').hide();
							});
							//]]>
						</script>
					</div>
					<?php endif; ?>

				<?php if ( ! $user_ID ): ?>
		
			<div id="comboxinfo">
					<div class="cominfodiv cominfodiv-author col-md-4 col-sm-4 col-xs-12">
					<p for="author" class="nicheng">
     <input type="text" name="author" id="author" class="texty" value="<?php echo $comment_author; ?>" tabindex="1" /> <span class="required">昵称*</span>
      </p>
</div>
					<div class="cominfodiv cominfodiv-email col-md-4 col-sm-4 col-xs-12">
					<p for="email">	<input type="text" name="email" id="email" class="texty" value="<?php echo $comment_author_email; ?>" tabindex="2" /> <span class="required">邮箱*</span>
						</p>
					</div>
					<div class="cominfodiv cominfodiv-url col-md-4 col-sm-4 col-xs-12">
					 	<p for="url"><input type="text" name="url" id="url" class="texty" value="<?php echo $comment_author_url; ?>" tabindex="3" /><span>网址 </span>
						</p>
					</div>
					
			
				
</div><?php endif; ?>
		       <div class=" cominfodiv-nr col-md-12 col-xs-12">  
<textarea class="texty" name="comment" id="comment" rows="10" tabindex="4" placeholder="输入评论内容..."></textarea>
							<div class="submitcom">
							
					<input id="submit" name="submit" type="submit" tabindex="5" value="提&nbsp;交"/>
					<?php comment_id_fields(); do_action('comment_form', $post->ID); ?>
				</div>
				<div id="cancel_comment_reply"><?php cancel_comment_reply_link( '取消回复' ); ?></div>
			
</div>
			
				
			</form>
			
			
			<script type="text/javascript">
				document.getElementById("comment").onkeydown = function (moz_ev){
				var ev = null;
				if (window.event){
				ev = window.event;
				}else{
				ev = moz_ev;
				}
				if (ev != null && ev.ctrlKey && ev.keyCode == 13){
				document.getElementById("submit").click();}
				}
			</script>
	 		<?php endif; ?>
		
		
	
	<?php if ( ! comments_open() ) : ?>
		<p class="no-comments">评论已关闭！</p>
	<?php endif; ?>
</div>
</div>
<!-- #comments -->