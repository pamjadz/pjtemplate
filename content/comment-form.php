<?php
if ( null === $post_id ) $post_id = get_the_ID();

if ( !comments_open($post_id) ) {
	do_action( 'comment_form_comments_closed' );
	return;
}

$commenter     = wp_get_current_commenter();
$user          = wp_get_current_user();
$user_identity = $user->exists() ? $user->display_name : '';
$html_req = ( get_option( 'require_name_email' ) ? " required='required'" : '' );

$required_text = sprintf(
    ' ' . __( 'Required fields are marked %s' ),
    '<span class="required">*</span>'
);
do_action( 'comment_form_before' ); ?>
<div id="respond">
	<?php
	comment_form_title( $args['title_reply'], $args['title_reply_to'] );
	cancel_comment_reply_link();
	if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) :
		do_action( 'comment_form_must_log_in_after' );
		return;
	?>
	<form action="<?php echo esc_url( site_url( '/wp-comments-post.php' ) ); ?>" method="post" id="commentform" novalidate>
		<?php do_action( 'comment_form_top' ); ?>
		
		<div class="row">
			<div class="col-lg-5">
				<?php
				if ( is_user_logged_in() ) :
					echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );
					do_action( 'comment_form_logged_in_after', $commenter, $user_identity );
				else :
		
				endif;
				?>
			</div>
			<div class="col-lg-7">

			</div>
		</div>
	</form>
</div>
<?php do_action( 'comment_form_after' ); ?>