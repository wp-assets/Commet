<?php 
add_action( 'cmb2_admin_init', 'comet_register_metabox' );

function comet_register_metabox(){

	$fix = '_comet_';


	$box = new_cmb2_box(array(
		'id'			=> 'video-object',
		'object_types'	=> array('post'),
		'title'			=>__('Aditional Field', 'comet'),
	));

	$box->add_field( array(
		'id'=> '_for-video',
		'type'=>'oembed',
		'name'=>__('Video URL','comet'),
	));

	$box->add_field( array(
		'id'=> '_for-audio',
		'type'=>'text',
		'name'=>__('Audio URL','comet'),
	));

	$box->add_field( array(
		'id'=> '_for-gallery',
		'type'=>'file_list',
		'name'=>__('Gallery Images','comet'),
	));

	$slider = new_cmb2_box(array(
		'title'			=> 'Slider Aditional',
		'id'			=> 'slider-meta',
		'object_types'	=> 'comet-slider',
	));

	$slider->add_field(array(
		'name'	=>__('Slider Text', 'comet'),
		'type'	=>	'text',
		'id'	=>	'_slider-text',
		'default' => 'We are a small design studio from San Francisco.'
	));


	$slider->add_field(array(
		'name'	=>__('Button Read More', 'comet'),
		'type'	=>	'text',
		'id'	=>	'_button-text',
		'default' => 'Read More',
	));


	$slider->add_field(array(
		'name'	=>__('Button Color', 'comet'),
		'type'	=>	'select',
		'id'	=>	'_first_button',
		'options' => array(
			'background'=>__('Background', 'comet'),
			'transparent'=>__('Transparent', 'comet'),
		)
	));


	$slider->add_field(array(
		'name'	=>__('Button Explore', 'comet'),
		'type'	=>	'text',
		'id'	=>	'_button-text-2',
		'default' => 'Services',
	));

	$slider->add_field(array(
		'name'	=>__('Button Color', 'comet'),
		'type'	=>	'select',
		'id'	=>	'_first_button-2',
		'options' => array(
			'background'=>__('Background', 'comet'),
			'transparent'=>__('Transparent', 'comet'),
		)
	));



}

