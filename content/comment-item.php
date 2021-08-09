<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
<div class="meta d-block d-md-flex align-items-center mb-2 position-relative" role="complementary">
	<img data-src="<?php echo get_avatar_url($comment, array('size' => '75','default' => THEMEURL.'assets/img/avatar.png')); ?>" alt="" class="avatar">
	<cite class="d-block d-md-inline-flex line-height-30 ml-md-3" itemprop="author"><?php comment_author(); ?></cite>
	<time class="d-block d-md-inline-flex line-height-30 text-muted ml-md-3" itemprop="datePublished" datetime="<?php echo date('c', get_comment_time('U', get_comment_ID())); ?>"><?php echo human_time_diff(get_comment_time('U'), current_time('timestamp')).' '.__('ago', txtdmn); ?></time>
	<?php edit_comment_link(__('Edit'),'',''); ?>
</div>
<div itemprop="text">
	<?php
	if ($comment->comment_approved == '0') echo '<p class="alert alert-warning mb-2" role="alert">'.__('Your comment is awaiting moderation.').'<p>';
	comment_text();
	?>
</div>
<p class="mt-n2 mb-0 text-muted"><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>