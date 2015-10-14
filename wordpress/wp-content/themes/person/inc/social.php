<div class="social-main">
		<span class="like">
	         <a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" title="我赞" class="favorite<?php if(isset($_COOKIE['ality_like_'.$post->ID])) echo ' done';?>"><i class="icon-zan"></i>喜欢 <i class="count">
	            <?php if( get_post_meta($post->ID,'ality_like',true) ){
					echo get_post_meta($post->ID,'ality_like',true);
				} else {
					echo '0';
				}?></i>
	        </a>
		</span>
		<span class="comment-s"><i class="icon-comment"></i><?php comments_popup_link( '抢沙发', '还有板凳', '评论 % ' ); ?></span>
	</div>
	<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

