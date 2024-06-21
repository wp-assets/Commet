<!DOCTYPE html>
<html <?php language_attributes(); ?> >
  
<head <?php body_class(); ?>>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!--if lt IE 9
    script(src='http://html5shim.googlecode.com/svn/trunk/html5.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')
    -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-46276885-13', 'auto');
      ga('send', 'pageview');
    </script>
    <?php global $comet; ?>
    <?php wp_head(); ?>
  </head>
  <body>
<!--     <div id="loader">
      <div class="centrize">
        <div class="v-center">
          <div id="mask"><span></span><span></span><span></span><span></span><span></span></div>
        </div>
      </div>
    </div> -->
    <header id="topnav">
      <div class="container">
        <div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php global $comet; echo $comet['light-logo']['url']?>" alt="" class="logo-light">
            <img src="<?php echo $comet['drak-logo']['url']?>" alt="" class="logo-dark">
          </a>
        </div>
        <div class="menu-extras">
          <div class="menu-item">
            <div class="cart"><a href="#"><i class="ti-bag"></i><span class="cart-number">2</span></a>
              <div class="shopping-cart">
                <div class="shopping-cart-info">
                  <div class="col-xs-6">
                    <div class="row">
                      <h6 class="upper">Your Cart</h6>
                    </div>
                  </div>
                  <div class="col-xs-6 text-right">
                    <div class="row">
                      <h6 class="upper">$399.99</h6>
                    </div>
                  </div>
                </div>
                <ul class="nav product-list">
                  <li>
                    <div class="product-thumbnail"><img src="<?php echo get_template_directory_uri(); ?>/images/shop/2.jpg" alt=""></div>
                    <div class="product-summary"><a href="#">Premium Suit Blazer</a><span>$199.99</span></div>
                  </li>
                  <li>
                    <div class="product-thumbnail"><img src="<?php echo get_template_directory_uri(); ?>/images/shop/5.jpg" alt=""></div>
                    <div class="product-summary"><a href="#">Reiss Vara Tailored Blazer</a><span>$199.99</span></div>
                  </li>
                </ul>
                <p><a href="#" class="btn btn-color btn-block btn-sm">Checkout</a></p>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="search"><a href="#"><i class="ti-search"></i></a>
              <div class="search-form">
                <form action="#" class="inline-form">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                      <button type="button" class="btn btn-color"><span><i class="ti-search"></i></span></button></span>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="menu-item"><a class="navbar-toggle">
              <div class="lines"><span></span><span></span><span></span></div></a></div>
        </div>
        <div id="navigation">

          <?php wp_nav_menu(array(
            'theme_location'=>'main-menu',
            'menu_class'=> 'navigation-menu',
            'container_class'=>'',
            'walker'=> new Custom_Walker_Nav_Menu(),
          ));?>
<!-- 
          <ul class="navigation-menu">

            <li class="has-submenu"><a href="#">Home</a>
              <ul class="submenu megamenu">
                <li>
                  <ul>
                    <li><span>Multi Page</span></li>
                    <li><a href="index.html">Home Classic</a></li>
                    <li><a href="index-01.html">Video Background</a></li>
                    <li><a href="index-02.html">HTML5 Video BG</a></li>
                    <li><a href="index-03.html">Animated Zoom Slider</a></li>
                    <li><a href="index-04.html">Text Rotator</a></li>
                  </ul>
                </li>
                <li>
                  <ul>
                    <li><span>One Page</span></li>
                    <li><a href="index-op.html">One Page Classic</a></li>
                    <li><a href="index-op-01.html">Video Background</a></li>
                    <li><a href="index-op-02.html">HTML5 Video BG</a></li>
                    <li><a href="index-op-03.html">Animated Zoom Slider</a></li>
                    <li><a href="index-op-04.html">Text Rotator</a></li>
                  </ul>
                </li>
                <li>
                  <ul>
                    <li><span>Home Layouts</span></li>
                    <li><a href="home-restaurant.html">Restaurant</a></li>
                    <li><a href="home-architecture.html">Architecture</a></li>
                    <li><a href="home-photography.html">Photography</a></li>
                    <li><a href="home-landing.html">Landing Page</a></li>
                    <li><a href="home-resume.html">Resume</a></li>
                  </ul>
                </li>
              </ul>
            </li>


            <li class="has-submenu"><a href="#">Pages</a>
              <ul class="submenu megamenu">
                <li>
                  <ul>
                    <li><span>Pages</span></li>
                    <li><a href="page-about.html">About Us</a></li>
                    <li><a href="page-about-2.html">About Us 2</a></li>
                    <li><a href="page-services.html">Services</a></li>
                    <li><a href="page-services-2.html">Services 2</a></li>
                    <li><a href="page-contact.html">Contact</a></li>
                    <li><a href="page-contact-2.html">Contact 2</a></li>
                  </ul>
                </li>
                <li>
                  <ul>
                    <li><span>Other Pages</span></li>
                    <li><a href="page-pricing.html">Pricing</a></li>
                    <li><a href="page-careers.html">Careers</a></li>
                    <li><a href="page-login.html">Login / Register</a></li>
                    <li><a href="page-coming-soon.html">Coming Soon</a></li>
                    <li><a href="page-404.html">Error 404</a></li>
                    <li><a href="page-faq.html">Faq</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="has-submenu"><a href="#">Elements</a>
              <ul class="submenu megamenu">
                <li>
                  <ul>
                    <li><span>Elements</span></li>
                    <li><a href="elements-accordions.html"><i class="ti-layout-accordion-merged"></i>Accordions</a></li>
                    <li><a href="elements-alerts.html"><i class="ti-comment-alt"></i>Alerts</a></li>
                    <li><a href="elements-buttons.html"><i class="ti-control-play"></i>Buttons</a></li>
                    <li><a href="elements-countdowns.html"><i class="ti-timer"></i>Countdowns </a></li>
                    <li><a href="elements-features.html"><i class="ti-view-grid"></i>Features Box</a></li>
                    <li><a href="elements-forms.html"><i class="ti-layout-cta-left"></i>Forms</a></li>
                    <li><a href="elements-grid.html"><i class="ti-layout"></i>Grid</a></li>
                  </ul>
                </li>
                <li>
                  <ul>
                    <li><span>Elements</span></li>
                    <li><a href="elements-icons.html"><i class="ti-image"></i>Icons </a></li>
                    <li><a href="elements-media.html"><i class="ti-volume"></i>Media Elements               </a></li>
                    <li><a href="elements-titles.html"><i class="ti-uppercase"></i>Page Titles</a></li>
                    <li><a href="elements-bars.html"><i class="ti-align-left"></i>Progress Bars</a></li>
                    <li><a href="elements-sliders.html"><i class="ti-layout-slider"></i>Sliders & Galleries</a></li>
                    <li><a href="elements-tabs.html"><i class="ti-layout-tab-window"></i>Tabs</a></li>
                    <li><a href="elements-typography.html"><i class="ti-paragraph"></i>Typography</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="has-submenu"><a href="#">Portfolio</a>
              <ul class="submenu">
                <li class="has-submenu"><a href="#">Boxed</a>
                  <ul class="submenu">
                    <li><a href="portfolio-boxed-2col.html">2 Columns</a></li>
                    <li><a href="portfolio-boxed-3col.html">3 Columns                </a></li>
                  </ul>
                </li>
                <li class="has-submenu"><a href="#">Wide</a>
                  <ul class="submenu">
                    <li><a href="portfolio-wide-2col.html">2 Columns</a></li>
                    <li><a href="portfolio-wide-3col.html">3 Columns                </a></li>
                  </ul>
                </li>
                <li class="has-submenu"><a href="#">Single</a>
                  <ul class="submenu">
                    <li><a href="portfolio-single-1.html">Single Work 1</a></li>
                    <li><a href="portfolio-single-2.html">Single Work 2</a></li>
                    <li><a href="portfolio-single-3.html">Single Work 3</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="has-submenu"><a href="#">Blog</a>
              <ul class="submenu">
                <li><a href="blog-fixed-image.html">Fixed Image</a></li>
                <li class="has-submenu"><a href="#">Classic</a>
                  <ul class="submenu">
                    <li><a href="blog.html">No Sidebar</a></li>
                    <li><a href="blog-sidebar.html">Right Sidebar</a></li>
                    <li><a href="blog-sidebar-left.html">Left Sidebar</a></li>
                  </ul>
                </li>
                <li class="has-submenu"><a href="#">Masonry</a>
                  <ul class="submenu">
                    <li><a href="blog-masonry.html">No Sidebar</a></li>
                    <li><a href="blog-masonry-sidebar.html">Right Sidebar</a></li>
                    <li><a href="blog-masonry-sidebar-left.html">Left Sidebar</a></li>
                  </ul>
                </li>
                <li class="has-submenu"><a href="#">Single Post</a>
                  <ul class="submenu">
                    <li><a href="blog-single.html">No Sidebar</a></li>
                    <li><a href="blog-single-sidebar.html">Right Sidebar</a></li>
                    <li><a href="blog-single-sidebar-left.html">Left Sidebar</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="has-submenu"><a href="#">Shop</a>
              <ul class="submenu">
                <li class="has-submenu"><a href="#">Shop Layout</a>
                  <ul class="submenu">
                    <li><a href="shop-2col.html">2 Columns</a></li>
                    <li><a href="shop-3col.html">3 Columns</a></li>
                    <li><a href="shop-4col.html">4 Columns</a></li>
                  </ul>
                </li>
                <li><a href="shop-single.html">Single Product</a></li>
                <li><a href="shop-cart.html">Cart</a></li>
                <li><a href="shop-checkout.html">Checkout</a></li>
              </ul>
            </li>
          </ul> -->



        </div>
      </div>
    </header>