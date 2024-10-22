<?php

$images = get_field('images');
$videos = get_field('videos');

?>
<div class='container-slider swiper mySwiper' id='swiper-1'>
	<div class='swiper-wrapper'>
		<?php
		foreach ((array)$images as $image) {
			if ($image) {
		?>
				<div class='img-about swiper-slide'>
					<img src="<?php echo $image; ?>">
				</div>

			<?php }
		}
		foreach ((array)$videos as $video) {
			if ($video) {
			?>
				<div class='swiper-slide'>
					<video controls>
						<source src="<?php echo $video; ?>" />
					</video>
				</div>

		<?php 	}
		}
		?>
	</div>
</div>
<!-- <div class='swiper-pagination'></div> -->
<?php
