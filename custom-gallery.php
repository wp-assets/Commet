<?php 

add_shortcode('gallery', 'comet_galleryshortcode');

function comet_galleryshortcode(){

	$att= shortcode_atts($attr, $content, array(
		'ids'=> '',
	), $attr );


	extract($att);

	$idd = explode(',', $ids);


	ob_start(); ?>
	<div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true" class="flexslider nav-outside">
		<ul class="slidess">

			<?php foreach ($idd as $id ) : ?>
				
				<?php $imon = wp_get_attachment_image_src( $id,'full'); ?>

			<li><img src="<?php echo $imon[0]; ?>" alt=""></li>


			<?php endforeach; ?>

		</ul>
	</div>

	<?php return ob_get_clean();

}


?>