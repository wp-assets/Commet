<?php 

/*
Template Name: a demo page
*/

// view database single

global $wpdb;

// $prefix = $wpdb->prefix;
// $usertable = $prefix.'users';

// $postitle = $prefix . 'posts';

// // echo $wpdb->get_var(" SELECT * FROM $usertable WHERE id = 1", 4);

// $posts = $wpdb->get_results(" SELECT * FROM $postitle WHERE post_type = 'post' AND post_status = 'publish'", OBJECT_K) ;

// foreach($posts as $post){
// 	echo $post->post_title.'</br>';
// }

?>


<?php if ( is_user_logged_in() && current_user_can('update_plugins') ) : ?>
	
	<form action="" method="POST">
		<input type="text" name ="naam" placeholder="Please type your name">
		<input type="submit" name="namesubmit" value="Submit">
	</form>

<?php endif ?>

<?php 

	// database table creation

	global $wpdb;

	$table_name = $wpdb->prefix . 'sujon'; //table prefix

	$infos = $wpdb->get_results("SELECT * FROM $table_name "); // selector showing

	foreach ($infos as $info) {
		$id = $info->id;
		$editlink = '?edit='.$id;
		$deletelink = '?delete='.$id;
		echo $id. ' '. $info-> name . ' <a href="'.$editlink.'">edit</a>'.' <a href="'.$deletelink.'">Delete</a>' .'</br>';
	}


?>
</br>
</br>
</hr>

<?php
	// edit query
 	if ( isset( $_GET['edit'] ) ) : 

	$id = $_GET['edit'];
	$value = $wpdb->get_var("SELECT name FROM $table_name WHERE id = $id ");

 ?>

	
	<form action="" method="POST">
		<input type="text" name ="naam" placeholder="Please Update your name" value="<?php echo $value; ?>">
		<input type="submit" name="nameupdate" value="Update">
	</form>

<?php endif; ?>


<?php 

// deleted query

/*$deleteid = isset($_GET['delete']) ? $_GET['delete'] : ' '; 

if (!empty($deleteid) ) {

	$wpdb->delete( $table_name, array(
		'id' => $deleteid
	) );


	global $post; 

	$postid = $post->ID;

	wp_redirect( get_permalink( $postid ) ); exit;

	// wp_redirect( get_page_link( $postid ) );
}*/


?>













