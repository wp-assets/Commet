            <article class="post-single">
              <div class="post-info">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <h6 class="upper"><span>By</span><a href="<?php the_author();?>"> <?php the_author();?></a><span class="dot"></span><span><?php the_time('d F Y'); ?></span><span class="dot"></span><?php the_tags(); ?></h6>
              </div>

              <div class="post-body">
                <iframe src="<?php echo get_post_meta(get_the_id(), '_for-video', true) ?>" frameborder="0"></iframe>
                <p><a href="#" class="btn btn-color btn-sm">Read More</a></p>
              </div>
            </article>

