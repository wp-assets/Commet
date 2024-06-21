<?php
/**
 * Redux Framework text config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Blog Header', 'comet' ),
		'desc'             => esc_html__( '', 'comet' ),
		'id'               => 'basic-text',
		'subsection'       => true,
		'customizer_width' => '700px',
		'fields'           => array(
			array(
				'id'       => 'text-blog',
				'type'     => 'text',
				'title'    => esc_html__( 'blog title', 'comet' ),
				'subtitle' => esc_html__( 'blog title', 'comet' ),
				'desc'     => esc_html__( 'blog Field Description', 'comet' ),
				'default'  => 'This Is Our Blog',
			),
			array(
				'id'       => 'text-des',
				'type'     => 'text',
				'title'    => esc_html__( 'blog Description', 'comet' ),
				'subtitle' => esc_html__( 'blog Description', 'comet' ),
				'desc'     => esc_html__( 'blog Field Description', 'comet' ),
				'default'  => 'We have a few tips for you.',
			),
		),
	)
);
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Footer Text', 'comet' ),
		'desc'             => esc_html__( '', 'comet' ),
		'id'               => 'footer',
		'subsection'       => true,
		'customizer_width' => '700px',
		'fields'           => array(
			array(
				'id'       => 'text-footer',
				'type'     => 'text',
				'title'    => esc_html__( 'footer text', 'comet' ),
				'subtitle' => esc_html__( 'footer text', 'comet' ),
				'desc'     => esc_html__( 'blog Field Description', 'comet' ),
				'default'  => 'All Right Reserved || Iman Ali',
			),
		),
	)
);