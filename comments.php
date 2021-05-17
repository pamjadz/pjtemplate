<h3 class="font-size-16 d-flex aling-items-center m-0">نظرات کاربران <span class="mr-auto text-muted font-weight-normal font-size-14"><?php comments_number(); ?></span></h3>

<?php if ( have_comments() ) : ?>
	<ul id="comments">
		<?php wp_list_comments('type=comment&callback=commentlisttemplate'); ?>
	</ul>
	<div class="form-row">
		<div class="col-6"><?php previous_comments_link() ?></div>
		<div class="col-6"><?php next_comments_link() ?></div>
	</div>
<?php
endif;

get_template_part('content/comment','form');
?>