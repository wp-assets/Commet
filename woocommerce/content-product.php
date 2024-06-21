<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
} ?>
        <div class="col-md-3 col-sm-6">
          <div class="shop-product">
            <div class="product-thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
              <div class="product-overlay">	
			<?php 

			global $product; echo apply_filters(
				'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
				sprintf(
					'<a href="%s" data-quantity="%s" class="btn btn-color-out btn-sm" %s>Add To Cart<i class="ti-bag"></i></a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
					esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
					isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
					esc_html( $product->add_to_cart_text() )
				),
				$product,
				$args
			); ?>
              </div>
            </div>

            <div class="product-info">
              <h4 class="upper"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4><span>$79.99</span>
              <div class="save-product"><a href="#"><i class="icon-heart"></i></a></div>
            </div>
          </div>
        </div>