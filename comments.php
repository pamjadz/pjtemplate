<?php

defined( 'ABSPATH' ) || exit;

if( ! comments_open() || post_password_required() ) return;
?>

<div id="comments">
	<?php if ( have_comments() ) : ?>

		<ul class="commentslist mb-4">
			<?php
			wp_list_comments([
				'callback' => function($comment, $args, $depth){
					get_template_part('content/comment', 'item', ['comment' => $comment, 'args' => $args, 'depth' => $depth]);
				}
			]);
			?>
		</ul>
		
		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
			echo '<nav class="pagination mt-n2 mb-4">';
			paginate_comments_links([
				'prev_text'	=> is_rtl() ? '&rarr;' : '&larr;',
				'next_text'	=> is_rtl() ? '&larr;' : '&rarr;',
				'type'		=> 'plain',
			]);
			echo '</nav>';
		}

	endif;

	comment_form();
	?>
</div>