<?php if ( have_comments() ) : ?>
	<ul id="comments">
		<?php wp_list_comments('type=comment&callback=commentlisttemplate'); ?>
	</ul>
	<div class="row g-3 mb-4">
		<div class="col-6"><?php previous_comments_link() ?></div>
		<div class="col-6"><?php next_comments_link() ?></div>
	</div>
<?php
endif;

get_template_part('content/comment','form');
?>