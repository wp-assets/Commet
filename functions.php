<?php 

/**
 * Comet functions and definitions
 *
 * Commet-2022
 * 
 * here you can change any functions
 */

// Theme Setup Default Function

add_action('after_setup_theme', 'comet_function');
function comet_function(){

	// Text Domain

	load_theme_textdomain('commet', get_template_directory_uri('/languages'));

	// Theme Support
	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');

	// create table

	global $wpdb;

	$prefix = $wpdb->prefix; 

	$table = $prefix . 'sujon';

	require_once( ABSPATH .'wp-admin/includes/upgrade.php');
	dbDelta("CREATE TABLE $table ( id INT AUTO_INCREMENT, name varchar(255), UNIQUE KEY id(id) )" );

	// end table



	add_theme_support('post-formats', array(
		'audio',
		'video',
		'quote',
		'gallery'
	));

	register_post_type('comet-slider', array(
		'labels'=> array(
			'name'=>__('Slider', 'comet'),
			'add_new'=>__('Add New Slider', 'comet'),
			'add_new_item'=>__('Add New Slider', 'comet'),

		),
		'public'=> true,
		'supports'=>array('thumbnail', 'editor', 'title')
	));


/* ----------------------------------------------------- */
/* Register Filter Post  Capability */
/* ----------------------------------------------------- */

if (current_user_can('manage_options')) {	

	register_post_type('comet-portfolio', array(
		'public'     					=> true,
		'labels' 						=> array(
			'name' 						=> 'Portfolio',
			'add_new' 					=> 'Add Portfolio',
			'all_items' 				=> 'All Portfolio',
			'add_new_item' 				=> 'Add New Portfolio',
			'set_featured_image'		=> 'Set Portfolio Image',
			'featured_image'			=> 'Portfolio Image',
			'remove_featured_image'		=> 'Remove Portfolio Image Easy',
		),
		'supports' 						=> ['title', 'editor', 'thumbnail', ],
		'menu_icon'						=> 'dashicons-smiley',
		'menu_position'					=> 5,

	) );

}
 	register_taxonomy('uniqe_portfolio_id', 'comet-portfolio', array(
		'public'     					=> true,
		'labels' 						=> array(
			'name' 						=> __('Category', 'comet'),
			'add_new' 					=> __('Add Category', 'comet'),
			'all_items' 				=> 'All Category',
			'add_new_item' 				=> 'Add New Category',
		),
		'hierachical'					=> true,

	));


// menu
	register_nav_menus(array(
		'main-menu'=>__('Main Menu', 'comet'),
		'mobile-menu'=>__('Mobile Menu', 'comet'),
		'footer-menu'=>__('Footer Menu', 'comet'),
	));

}




// Adding Fonts
add_action('wp_enqueue_scripts', 'get_comet_fonts');

function get_comet_fonts(){

	$fonts = array();

	$fonts[] = 'Montserrat:400,700';
	$fonts[] = 'Raleway:300,400,500';
	$fonts[] = 'Halant:300,400';

	$comet_fonts = add_query_arg(
		array(
			'family' => urlencode(implode('|', $fonts )), 
			'subset' => 'latin',
		),
		'https://fonts.googleapis.com/css',

	);

	return $comet_fonts; 
};



// include all script function

add_action('wp_enqueue_scripts', 'comet_style_function');

function comet_style_function(){

	wp_enqueue_style('style', get_stylesheet_uri() );

	wp_enqueue_style('bundle',get_template_directory_uri().'/css/bundle.css' );
	wp_enqueue_style('old-style',get_template_directory_uri().'/css/style.css' );

	wp_enqueue_style('fonts', get_comet_fonts() );
	wp_enqueue_style('coment-reply');




}


// conditional function

add_action('wp_enqueue_scripts', 'conditional_function');

function conditional_function(){
	wp_enqueue_script('html5', 'http://html5shim.googlecode.com/svn/trunk/html5.js');

	wp_script_add_data('html5', 'conditonal', 'lt IE 9');

	wp_enqueue_script('respond', 'https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js');
	
	wp_script_add_data('respond','conditonal','lt IE 9');

	wp_enqueue_script('coment-reply');
}



// jQuery scripts

add_action('wp_enqueue_scripts', 'comet_scripts');

function comet_scripts(){


	
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery.js');

	wp_enqueue_script('bundle', get_template_directory_uri().'/js/bundle.js', '', array('jquery'), true);

	wp_enqueue_script('map', 'https://maps.googleapis.com/maps/api/js?v=3.exp', '', array('jquery'), true);

	wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', '', array('jquery', 'bundle'), true);
}




if (file_exists( dirname(__FILE__). '/gallery.php')) {
	require_once(dirname(__FILE__). '/gallery.php');
}

if (file_exists( dirname(__FILE__).'/custom-widgets/latest-post.php')) {
	require_once(dirname(__FILE__).'/custom-widgets/latest-post.php');
}

if (file_exists( dirname(__FILE__).'/redux-admin/redux-framework.php')) {
	require_once(dirname(__FILE__).'/redux-admin/redux-framework.php');
}

if (file_exists( dirname(__FILE__).'/redux-admin/sample/config.php')) {
	require_once(dirname(__FILE__).'/redux-admin/sample/config.php');
}

if (file_exists( dirname(__FILE__).'/lib/cmb2/init.php')) {
	require_once(dirname(__FILE__).'/lib/cmb2/init.php');
}

if (file_exists( dirname(__FILE__).'/lib/cmb2/config.php')) {
	require_once(dirname(__FILE__).'/lib/cmb2/config.php');
}

if (file_exists( dirname(__FILE__).'/custom_nav_walker3.php')) {
	require_once(dirname(__FILE__).'/custom_nav_walker3.php');
}

if (file_exists( dirname(__FILE__).'/shortcodes/shortcodes.php')) {
	require_once(dirname(__FILE__).'/shortcodes/shortcodes.php');
}

if (file_exists( dirname(__FILE__).'/lib/plugins/require_plugin.php')) {
	require_once(dirname(__FILE__).'/lib/plugins/require_plugin.php');
}

// Widgets

add_action('widgets_init', 'comet_widgets');

function comet_widgets(){
	register_sidebar( array(
		'name'=> __('Right Sidebar', 'comet'),
		'descriptions'=> 'Add Your Right Sidebar Widget',
		'id'=> 'right-sidebar',
		'before_widget'=>'<div class="widget">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6 class="upper">',
		'after_title'=>'</h6>',
	));

	register_sidebar( array(
		'name'=> __('First Footer Widget Area', 'comet'),
		'descriptions'=> 'Add Your First Widget Here',
		'id'=> 'first-footer',
		'before_widget'=>'<div class="col-sm-4"><div class="widget">',
		'after_widget'=>'</div></div>',
		'before_title'=>'<h6 class="upper">',
		'after_title'=>'</h6>',
	));

	register_sidebar( array(
		'name'=> __('Last Footer Widget Area', 'comet'),
		'descriptions'=> 'Add Your Last Widget Here',
		'id'=> 'last-footer',
		'before_widget'=>'<div class="widget">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6 class="upper">',
		'after_title'=>'</h6>',
	));
}



add_action('admin_print_scripts', 'notun_script_add_korbo', 1000);

function notun_script_add_korbo() { ?>

<?php if (get_post_type() == 'post') : ?>


<script>
	
	jQuery(document).ready(function(){

		var id = jQuery('input[name="post_format"]:checked').attr('id');


		if (id == 'post-format-0') {
			jQuery('#video-object').hide();
		}else{
			jQuery('#video-object').show();
		}

		if (id == 'post-format-video') {
			jQuery('.cmb2-id--for-video').show();
		}else{
			jQuery('.cmb2-id--for-video').hide();
		}

		if (id == 'post-format-audio') {
			jQuery('.cmb2-id--for-audio').show();
		}else{
			jQuery('.cmb2-id--for-audio').hide();
		}

		if (id == 'post-format-gallery') {
			jQuery('.cmb2-id--for-gallery').show();
		}else{
			jQuery('.cmb2-id--for-gallery').hide();
		}



		jQuery('input[name="post_format"]').change(function(){
			jQuery('.cmb2-id--for-video').hide();
			jQuery('.cmb2-id--for-audio').hide();
			jQuery('.cmb2-id--for-gallery').hide();


			var id = jQuery('input[name="post_format"]:checked').attr('id');

			if (id == 'post-format-0') {
				jQuery('#video-object').hide();
			}else{
				jQuery('#video-object').show();
			}

			if (id == 'post-format-video') {
				jQuery('.cmb2-id--for-video').show();
			}else{
				jQuery('.cmb2-id--for-video').hide();
			}

			if (id == 'post-format-audio') {
				jQuery('.cmb2-id--for-audio').show();
			}else{
				jQuery('.cmb2-id--for-audio').hide();
			}

			if (id == 'post-format-gallery') {
				jQuery('.cmb2-id--for-gallery').show();
			}else{
				jQuery('.cmb2-id--for-gallery').hide();
			}

		})





	})


</script>

	<?php endif; ?>

<?php }


register_deactivation_hook(__FILE__, 'flush_reright_rulse');

function flush_reright_rulse(){
	flush_rewrite_rules();
}

add_action('vc_before_init', 'visualcomposer_functions');

function visualcomposer_functions(){

	vc_set_as_theme();

	vc_map(
		array(
			'name'		=>	'Comet Slider',
			'base'		=>	'comet-slider',
			'icon'		=>	'fa fa-google',
		)
	);

}





?>


<?php

	// function commet_custom_comment_form($defaults){

	// 	$defaults['comment_notes_before'] = '';
	// 	$defaults['id_form'] = 'comment-form';
	// 	$defaults['comment_field'] = '<div class="form-group">
 //          <textarea name="comment"placeholder="Comment" class="form-control" spellcheck="false"></textarea>
 //        </div> ';
	
	// 	return $defaults;

	// }


	// add_filter('comment_form_defaults', 'commet_custom_comment_form');


	// function comet_custom_comment_fields($fields){
	// 	$commenter = wp_get_current_commenter();
	// 	$reg = get_option('requrie_name_email');
	// 	$aria_reg = ( $reg ? "aria-required ='true' " : " ");


	// 	$fields = array(
	// 		'author'   =>  '<div class="form-group">'.'<input type="text" placeholder="Name" class="form-control"  name="author" value="' .esc_attr($commenter['comment_author']).   '" '.$aria_reg. '>'.'</div>'.'<label for="author">'. __('Name', 'comet').( $reg ? '*' : ' ').'</label> ', 
			

			
	// 		'email'   =>  '<div class="form-group last">'.'<input type="email" placeholder="Email" class="form-control"  name="email" value="' .esc_attr($commenter['comment_author_email']).   '" '.$aria_reg. '>'.'</div>'.'<label for="email">'. __('Email', 'comet').( $reg ? '*' : ' ').'</label> ', 
			

			
	// 		'url'   =>  '<div class="form-group last">'.'<input type="text" placeholder="Website" class="form-control"  name="url" value="' .esc_attr($commenter['comment_author_url']).   '" '.$aria_reg. '>'.'</div>'.'<label for="email">'. __('Email', 'comet').( $reg ? '*' : ' ').'</label> ', 
			

			
	// 	);

	// }

	// add_filter('comment_form_default_fields', 'comet_custom_comment_fields');

?>
<!-- adaptive blog theme custom comment -->

<!-- woocommerce -->

<?php

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10);

add_action('woocommerce_template_loop_product_link_open', 'comet_hook_open', 10);
function comet_hook_open(){
	echo '<div class="shop-product">';
}

add_action('woocommerce_template_loop_product_link_close', 'comet_hook_close', 5);
function comet_hook_close(){
	echo '</div>';
}

	// Insert Query

	global $wpdb;

	if (isset($_POST['namesubmit']) ) {
		$tablename = $wpdb->prefix. 'sujon';
		$name = $_POST['naam'];

		$wpdb->insert($tablename, array(
			'name' => $name,
		));

	}
	// end Insert Query

	// Update Query

	$id = $_GET['edit'];
	$tablename = $wpdb->prefix. 'sujon';
	$data = $_POST['naam'];

if (isset($_POST['nameupdate']) ){


	// replace
	$wpdb->replace($tablename, array(
		'id' => $id,
		'name' => $data,
	));

/*	$wpdb->update($tablename, array(
		'name' => $data,
	));*/


}


// Search Filtering 


add_action('add_meta_boxes', 'custom_theme_metabox');

function custom_theme_metabox(){
	add_meta_box('student-info', 'Student Informations', 'students_information', 'sorolipi_students');
}

function students_information(){ ?>
	<p>
		<label for="student_fname">Student First Name</label>

		<?php $fulname = get_post_meta(get_the_id(), 'student_fname', true);?>
		<?php $lstname = get_post_meta(get_the_id(), 'student_lname', true);?>

		<input type="text" class="widefat" id="student_fname" name="student_fname" placeholder="Frist Name" value="<?php echo $fulname;?>">
	</p>
	<p>
		<label for="student_lname">Student Last Name</label>
		<input type="text" class="widefat" id="student_lname" name="student_lname" placeholder="Frist Last" value="<?php echo $lstname; ?>">
	</p>
	<p>
		<label for="student_class">Student Class</label><br/>
		<select name="student_class" id="student_class">
			<?php 
			$number = 0;
			while( $number < 10 ) : 
				$number++;
				$db_value = get_post_meta(get_the_id(), '_student_key', true);
			?>
			<option value="<?php echo $number; ?>" <?php if($number == $db_value ){echo "selected='selected'";} ?> >Class <?php echo $number; ?></option>
			<?php endwhile; ?>
		</select>

	</p>
	<p>
		<label for="student_section">Student Section</label><br/>
		<select name="student_section" id="student_section">

			<?php 
				$section_stu = get_post_meta( get_the_id(),'_section_key', true );
				$stu_roll = get_post_meta( get_the_id(), '_student_roll', true);
				$stu_age = get_post_meta( get_the_id(), '_student_age', true); 
			 ?>

			<option value="a" <?php if($section_stu == "a") : echo "selected='selected'; " ; endif; ?> >A</option>
			<option value="b" <?php if($section_stu == "b") : echo "selected='selected'; "; endif; ?> >B</option>
			<option value="c" <?php if($section_stu == "c") : echo "selected='selected'; "; endif; ?> >C</option>
		</select>
		
	</p>
	<p>
		<label for="student_roll">Student Roll</label>
		<input type="number" class="widefat" id="student_roll" name="student_roll" placeholder="Student Roll" value="<?php echo $stu_roll;?>">
	</p>
	<p>
		<label for="student_age">Student Age</label>
		<input type="number" class="widefat" id="student_age" name="student_age" placeholder="Student Age" value="<?php echo $stu_age;?>">
	</p>

<?php }

add_action('save_post', 'student_metabox_update');

function student_metabox_update(){

	$fname = $_REQUEST['student_fname'];
	$lname = $_REQUEST['student_lname'];
	$stu_class = $_REQUEST['student_class'];
	$stu_section = $_REQUEST['student_section'];
	$stu_roll = $_REQUEST['student_roll'];
	$stu_age = $_REQUEST['student_age'];

	update_post_meta( get_the_id(), '_student_fname', $fname);
	update_post_meta( get_the_id(), '_student_lname', $lname);
	update_post_meta( get_the_id(), '_student_key', $stu_class);
	update_post_meta( get_the_id(), '_section_key', $stu_section);
	update_post_meta( get_the_id(), '_student_roll', $stu_roll);
	update_post_meta( get_the_id(), '_student_age', $stu_age);
}



// Add ShortCode

add_shortcode('student-search', 'student_search_from');

function student_search_from(){
	ob_start(); ?>

	<?php 

	global $post; 

	$pageid = $post->ID;

	$link = get_permalink($pageid);

	?>


	<form action="<?php echo $link; ?>" method="GET">

		<input type="hidden" name="search" value="student" >
		
		<label for="student_class">Class</label><br/>
		<select name="class" id="student_class">
			<?php 
			$number = 0;
			while( $number < 10 ) : 
				$number++;
			?>
				<option value="<?php echo $number; ?>" >Class <?php echo $number; ?></option>
			<?php endwhile; ?>
		</select>

		<select name="section" id="student_section">

			<?php 
				$section_stu = get_post_meta( get_the_id(),'_section_key', true );
				$stu_roll = get_post_meta( get_the_id(), '_student_roll', true);
				$stu_age = get_post_meta( get_the_id(), '_student_age', true); 
			 ?>

			<option value="a" <?php if($section_stu == "a") : echo "selected='selected'; " ; endif; ?> >Section A</option>
			<option value="b" <?php if($section_stu == "b") : echo "selected='selected'; "; endif; ?> >Section B</option>
			<option value="c" <?php if($section_stu == "c") : echo "selected='selected'; "; endif; ?> >Section C</option>
		</select>

		<input type="submit" value="Search Students">

	</form>


<?php return ob_get_clean(); 
}




