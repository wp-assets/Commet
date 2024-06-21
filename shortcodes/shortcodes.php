<?php 
// slider

add_shortcode('comet-slider', 'comet_short_codes');
function comet_short_codes($attr, $content = null ){

$attributes = extract(shortcode_atts(array(
  'background'=> 'btn-color btn-full',
  'tranparent'=>'btn-light-out',
  'button_text'=> 'Services',
  'button_url'=> 'http:sorolipi.com/',

), $attr) );




ob_start() ?>
    <section id="home">
      <div id="home-slider" class="flexslider">
        <ul class="slides">

		<?php $slider = new WP_Query(array(
			'post_type'=>'comet-slider',
			'posts_per_page'=> 2
		))?>

        <?php while ($slider->have_posts()) : $slider->the_post() ?>
          <li><?php the_post_thumbnail(); ?>
            <div class="slide-wrap">
              <div class="slide-content">
                <div class="container">
                  <h1><?php the_title(); ?><span class="red-dot"></span></h1>
                  <h6><?php echo get_post_meta(get_the_id(), '_slider-text', true)?></h6>
                    <p>

                     <?php $first_button = get_post_meta(get_the_id(), '_button-text', true); ?>

                     <?php if (!empty($first_button) ) : ?>

                      <a href="<?php the_permalink(); ?>" class="btn 
                        <?php if ( get_post_meta(get_the_id(), '_first_button', true) == 'transparent') { 
                          echo 'btn-light-out'; }
                          else{ echo 'btn-color btn-full'; 
                        }?> ">
                    
                      <?php echo $first_button; ?></a>
                      <?php endif; ?>


                      <a href="<?php the_permalink(); ?>" class="btn <?php 
                      if (get_post_meta(get_the_id(), '_first_button-2', true ) == 'background') {
                        echo 'btn-color btn-full';
                      }else{
                        echo 'btn-light-out';
                      }

                    ?>"><?php echo get_post_meta(get_the_id(), '_button-text-2', true)?></a>
                    </p>
                </div>
              </div>
            </div>
          </li>

		<?php endwhile; wp_reset_postdata(); ?>


        </ul>
      </div>
    </section>

<?php return ob_get_clean(); 
}

// about

add_shortcode('comet-about', 'comet_about_shortcode');
function comet_about_shortcode($attr, $content = null ){ 
 

  $attributes = extract(shortcode_atts(array(
    'title' => 'Who We Are',
    'subtitle' => 'We are driven by creative.',
  ), $attr ) );

  ob_start(); ?>

    <section id="about">
      <div class="container">
        <div class="title center">
          <h4 class="upper"><?php echo $subtitle; ?></h4>
          <h2><?php echo $title; ?><span class="red-dot"></span></h2>
          <hr>
        </div>
        <div class="section-content">
          <div class="col-md-8 col-md-offset-2">
            <p class="lead-text serif text-center"><?php echo $content; ?></p>
          </div>
        </div>
      </div>
    </section>

<?php return ob_get_clean();

}








add_shortcode('comet-expertise', 'comet_expertise_shortcode');
function comet_expertise_shortcode($attr, $content = null ){ 
 

  $attributes = extract(shortcode_atts(array(
    'title' => 'Expertise',
    'subtitle' => 'This is what we love to do.',
    'bgimage' => get_template_directory_uri().'/images/bg/33.jpg',
    'first_front_icon' => 'focus',
    'first_title' => 'Expertise',
    'first_back_icon' => 'back',
    'first_content' => 'Facilis doloribus illum quis, expedita mollitia voluptate non iure, perspiciatis repellat eveniet volup',

    'secound_front_icon' => 'layers',
    'secound_back_icon' => 'back',
    'secound_title' => 'Interactive',
    'secound_content' => 'Commodi totam esse quis alias, nihil voluptas repellat magni, id fuga perspiciatis, ut quia beatae, accus.',


    'thirth_front_icon' => 'mobile',
    'thirth_back_icon' => 'back',
    'thirth_title' => 'Production',
    'thirth_content' => 'Doloribus qui asperiores nisi placeat volup eum, nemo est, praesentium fuga alias sit quis atque accus.',


    'forth_front_icon' => 'globe',
    'forth_back_icon' => 'back',
    'forth_title' => 'Editing',
    'forth_content' => 'Aliquid repellat facilis quis. Sequi excepturi quis dolorem eligendi deleniti fuga rerum itaque.',


  ), $attr ) );

  ob_start(); ?>

    <section class="p-0 b-0">
      <div class="col-md-6 col-sm-4 img-side img-left mb-0">
        <div class="img-holder"><img src="<?php echo $bgimage; ?>" alt="" class="bg-img">
          <div class="centrize">
            <div class="v-center">
              <div class="title txt-xs-center">
                <h4 class="upper"><?php echo $subtitle; ?></h4>
                <h3><?php echo $title; ?><span class="red-dot"></span></h3>
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
        <div class="row">
          <div class="services">

            <div class="col-sm-6 border-bottom border-right">
              <div class="service"><i class="icon-<?php echo $first_front_icon; ?>"></i><span class="<?php echo $first_back_icon?>-icon"><i class="icon-<?php echo $first_front_icon; ?>"></i></span>
                <h4><?php echo $first_title; ?></h4>
                <hr>
                <p class="alt-paragraph"><?php echo $first_content; ?></p>
              </div>
            </div>

            <div class="col-sm-6 border-bottom">
              <div class="service">
                <i class="icon-<?php echo $secound_front_icon; ?>"></i>
                  <span class="<?php echo $secound_back_icon; ?>-icon">
                    <i class="icon-<?php echo $secound_front_icon; ?>"></i>
                  </span>
                  <h4><?php echo $secound_title; ?></h4>
                <hr>
                  <p class="alt-paragraph"><?php echo $secound_content; ?></p>
              </div>
            </div>

            <div class="col-sm-6 border-bottom border-right">           
              <div class="service"><i class="icon-<?php echo $thirth_front_icon; ?>"></i><span class="<?php echo $thirth_back_icon; ?>-icon"><i class="icon-<?php echo $thirth_front_icon; ?>"></i></span>
                <h4><?php echo $thirth_title; ?></h4>
                <hr>
                <p class="alt-paragraph"><?php echo $thirth_content; ?></p>
              </div>
            </div>




            <div class="col-sm-6 border-bottom">           
              <div class="service"><i class="icon-<?php echo $forth_front_icon; ?>"></i><span class="<?php echo $forth_back_icon; ?>-icon"><i class="icon-<?php echo $forth_front_icon; ?>"></i></span>
                <h4><?php echo $forth_title; ?></h4>
                <hr>
                <p class="alt-paragraph"><?php echo $forth_content; ?></p>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </section>

<?php return ob_get_clean();

}




add_shortcode('filter_portfolio', 'comet_isotop_function');

function comet_isotop_function($attr, $content = null){

$attributes = extract( shortcode_atts(array(
  'title'=>'Selected Works',
), $attr ) );

ob_start();?>
    <section id="portfolio" class="pb-0">
      <div class="container">
        <div class="col-md-6">
          <div class="title m-0 txt-xs-center txt-sm-center">
            <h2 class="upper"><?php echo $title; ?><span class="red-dot"></span></h2>
            <hr>
          </div>
        </div>
        <div class="col-md-6">
          <ul id="filters" class="no-fix mt-25">
            <li data-filter="*" class="active">All</li>

            <?php 
            $terms = get_terms('uniqe_portfolio_id') ;
            foreach( $terms as $term) : ?>
            <li data-filter=".<?php echo $term->slug ?>"><?php echo $term->name; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="section-content pb-0">     
        <div id="works" class="four-col wide mt-50">
        <?php $proft_post = new WP_Query(array(
            'post_type'=>'comet-portfolio',
            'posts_per_page'=> 8,
          ));
        ?>
          <?php while ($proft_post-> have_posts() ) : $proft_post-> the_post(); ?>

          <div class="work-item <?php  
            $terms = get_the_terms(get_the_id(),'uniqe_portfolio_id') ; 
            foreach($terms as $term ){ 
              echo $term->slug. " "; 
            } ?>">
            <div class="work-detail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?>
                <div class="work-info">
                  <div class="centrize">
                    <div class="v-center">
                      <h3><?php the_title(); ?></h3>
                      <p><?php  $terms = get_the_terms(get_the_id(),'uniqe_portfolio_id') ;
                        foreach($terms as $term ){
                          echo $term->name." ";
                        } ?>
                      </p>
                    </div>
                  </div>
                </div></a></div>
          </div>

          <?php endwhile; wp_reset_postdata(); ?>

        </div>
      </div>
    </section>
<?php return ob_get_clean();





}