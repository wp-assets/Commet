<?php get_header();?>

    <section class="page-title">
      <div class="container">

      	<?php 

      	$student = new WP_Query(
	      	array(
	      		'post_type'			=> 	'students_information',
	      		'posts_per_page'	=> 	-1,
	      	)
      	);


      	while ($student->have_posts() ) : $student-> the_post(); ?>


      	<?php endwhile; ?>


      </div>
    </section>

<?php get_footer();  ?>