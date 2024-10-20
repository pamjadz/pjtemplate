<?php

defined('ABSPATH') || exit;
get_header(); ?>

<main id="siteIntro" class="splide d-flex flex-column" data-splide='{"type":"loop","autoplay":true,"interval":5000,"direction":"<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>","arrows":true,"pagination":false}'>
	<div class="slides">
		<div class="splide__track h-100">
			<div class="splide__list h-100">
				<div class="splide__slide d-flex align-items-center justify-content-center" style="background-image: url('<?php echo THEMEURL.'/assets/media/slidertemp.webp'; ?>');">
					<div class="container">
						<div class="col-lg-6 offset-lg-6 lh-40">
							<p class="text-primary">خدمات پس از فروش</p>
							<p class="fw-900 fsz-50">کارِ ما، کنترل دور موتورِ</p>
							<p class="fsz-18">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ  و با استفاده از  طراحان گرافیک است   چاپگرها و متون بلکه روزنامه و مجله در ستون و  سطرآنچنان که لازم است</p>
							<p><a href="#" class="btn btn-icon btn-primary">محصولات <svg width="18" height="18"><use xlink:href="#icon-arrow-end" /></svg></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="splide__arrows">
			<button class="splide__arrow splide__arrow--prev btn btn-default" type="button" aria-label="Previous slide"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40" focusable="false"><path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path></svg></button>
			<button class="splide__arrow splide__arrow--next btn btn-default" type="button" aria-label="Next slide" aria-controls="siteIntro-track"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40" focusable="false"><path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path></svg></button>
		</div>
	</div>
	<div class="contacts row g-0 lh-40 fsz-18 text-center">
		<div class="col-6 col-lg-4 p-3 order-first">TEST</div>
		<div class="col-6 col-lg-4 p-3 order-lg-last"><?php bloginfo('admin_email'); ?></div>
		<div class="col-lg-4 p-3 socials">TEST</div>
	</div>
</main>

<?php get_footer(null, ['only_meta' => true]); ?>