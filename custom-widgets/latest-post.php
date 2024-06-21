<?php 

// custom widget development basic
class comet_latest_post extends WP_Widget{

	public function __construct(){

		parent:: __construct('comet-latest-post', 'Comet Latest Post', array(
			'description' => 'Custom Latest Post Widget By Comet Theme',
		));
	}
	public function widget($jekono, $onnota){ ?>

	<?php echo $jekono['before_widget'];?>
  	<?php echo $jekono['before_title'];?>Comet Latest Posts<?php echo $jekono['after_title'];?>
		<ul class="nav">
  	<?php
		  $posts = new WP_Query(array(
		  	'post_type'=>'post',
		  	'posts_per_page' => $onnota['post_count']
		  )); 
	  ?>
		<?php while ( $posts-> have_posts()): $posts-> the_post() ?>
		    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?>
		    <i class="ti-arrow-right"></i>
		    <?php if ($onnota['date'] == 'show'): ?>span><?php the_time('d F Y'); ?></span>
		    <?php endif ?>
		    	</a></li>
		<?php endwhile; ?>
		</ul>

	<?php echo $jekono['after_widget'];?>

		
	<?php }

	public function form($onnota){?>
		<p>
			<label for="<?php echo $this-> get_field_id('title'); ?>">Title: </label>
			<input type="text" id="<?php echo $this-> get_field_id('title'); ?>" class="widefat" name="<?php echo $this-> get_field_name('title'); ?>" value="<?php echo $onnota['title']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('post_count');?>">Number of posts to show:</label>
			<input class="tiny-text" id="<?php echo $this->get_field_id('post_count');?>" name="<?php echo $this->get_field_name('post_count');?>" type="number" step="1" min="1" value="<?php echo $onnota['post_count']?>" size="3">
		</p>

		<?php 
		if ($onnota['date'] == 'show') {
			$show = "checked='checked'";
		}else{
			$hide = "checked='checked'"; 
		}
		?>
		<p>
			<input type="radio" value="show" id="<?php echo $this->get_field_id('showdate'); ?>" name="<?php echo $this->get_field_name('date'); ?>" >
			<label for="<?php echo $this->get_field_id('showdate'); ?>" <?php if(isset($show)) {echo $show; }  ?> >Show Date</label>
		</p>
		<p>
			<input type="radio" value="hide" id="<?php echo $this->get_field_id('hidedate'); ?>" name="<?php echo $this->get_field_name('date'); ?>" >
			<label for="<?php echo $this->get_field_id('hidedate'); ?>"<?php if(isset($hide)) {echo $hide; }  ?> >Hide Date</label>
		</p>


	<?php }
}


add_action('widgets_init', 'latest_post_function');

function latest_post_function(){
	register_widget('comet_latest_post');
}
