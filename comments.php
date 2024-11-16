<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */

defined( 'ABSPATH' ) || exit;

if( ( !comments_open() && !have_comments() ) || post_password_required() ) return;
?>

<div id="comments">
	<?php if ( have_comments() ) : ?>

		<ul class="commentslist">
			<?php
			wp_list_comments([
				'callback' => function($comment, $args, $depth){
					include THEMEDIR.'parts/comment-item.php';
				}
			]);
			?>
		</ul>
		
		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
			echo '<nav class="pagination">';
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