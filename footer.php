    <footer id="footer-widgets">
      <div class="container">
        <div class="go-top"><a href="#top"><i class="ti-arrow-up"></i></a></div>
        <div class="col-md-6 ov-h">

          <?php dynamic_sidebar('first-footer');?>

        </div>
        <div class="col-md-4 col-md-offset-2">
          
          <?php dynamic_sidebar('last-footer'); ?>

        </div>
      </div>
    </footer>

    <footer id="footer">
      <div class="container">
        <div class="footer-wrap">
          <div class="col-md-4">
            <div class="copy-text">
              <p><i class="icon-heart red mr-15"></i><?php global $comet; echo $comet['copyright-text']?></p>
            </div>
          </div>
          <div class="col-md-4">
            <ul class="list-inline">
              <li><a href="#">About</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <div class="footer-social">
              <ul>
                <li><a target="_blank" href="<?php echo $comet['facebook_url']?>"><i class="ti-facebook"></i></a></li>
                <li><a target="_blank" href="<?php echo $comet['twitter_url']?>"><i class="ti-twitter-alt"></i></a></li>
                <li><a target="_blank" href="<?php echo $comet['linkedin_url']?>"><i class="ti-linkedin"></i></a></li>
                <li><a target="_blank" href="<?php echo $comet['instagram_url']?>"><i class="ti-instagram"></i></a></li>
                <li><a target="_blank" href="<?php echo $comet['dribbble_url']?>"><i class="ti-dribbble"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <?php wp_footer(); ?>


  </body>


</html>
