<?php

defined( 'ABSPATH' ) || exit;

if ( have_comments() ) : ?>
	<ul class="commentslist mb-4">
		<?php
		wp_list_comments([
			'callback' => function($comment, $args, $depth){
				get_template_part('content/comment', 'item', ['comment' => $comment, 'args' => $args, 'depth' => $depth]);
			}
		]);
		?>
	</ul>
	<div class="row g-3 mb-4">
		<div class="col-6"><?php previous_comments_link() ?></div>
		<div class="col-6"><?php next_comments_link() ?></div>
	</div> <?php
endif;

get_template_part('content/comment','form');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */