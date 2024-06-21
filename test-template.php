<?php 
/*
Template Name: Test-Template
*/

get_header(); ?>
<?php

 	$currentpage = get_query_var('paged') ? get_query_var('paged') : '1';

	$portfolio = new WP_Query(array(
		'post_type'=> 'comet-portfolio',
		'posts_per_page'=> 2,
		'paged'=> $currentpage,
	) );
?>

<?php while ($portfolio-> have_posts() ) : $portfolio-> the_post() ; ?>


<h2><?php the_title(); ?></h2>


<?php endwhile; ?>

<?php
$maxpage = $portfolio->max_num_pages;


echo paginate_links(array(
	'current'=> $currentpage,
	'total'=> $maxpage,
	'show_all'=> true
)); ?>

<?php get_footer(); ?>