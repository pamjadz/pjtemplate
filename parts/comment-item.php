<?php 
/**
 * The template for displaying comment item
 *
 * @see 	https://developer.wordpress.org/reference/classes/wp_comment/
 * @author 	Pouriya Amjadzadeh
 * @version 3.0.0
 */

defined('ABSPATH') || exit;
?>

<li <?php comment_class($args['has_children'] ? 'no_child' :'has_children') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
	<div class="commnetbody<?php if( get_option( 'show_avatars' ) ) echo ' show-avatar'; ?>">
		<?php if( get_option( 'show_avatars' ) ) echo get_avatar($comment, 60, '', get_comment_author()); ?>
		<div class="comment-meta">
			<cite class="commenter" itemprop="author"><?php comment_author(); ?></cite>
			<time class="comment_date" itemprop="datePublished" datetime="<?php echo date('c', get_comment_time('U', get_comment_ID())); ?>"><?php echo human_time_diff(get_comment_time('U'), current_time('timestamp')).' '.__('ago', txtdmn); ?></time>
			<?php
			comment_reply_link(wp_parse_args([
				'depth'			=> $depth,
				'max_depth'		=> $args['max_depth']
			]), $args);
			?>
		</div>
		<div class="comment_text" itemprop="text">
			<?php
			if ($comment->comment_approved == '0') printf('<p class="text-info mb-2" role="alert">%s<p>', esc_html__('Your comment is awaiting moderation.'));
			comment_text();
			?>
		</div>
	</div>