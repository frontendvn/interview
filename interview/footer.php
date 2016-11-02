<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package interview
 */

?>
<div class="line-footer"></div>
    <footer>
      <div class="container">
        <div class="footer">
          <div class="widget widget-logo col-1">
            <h5 class="logo-footer"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-footer.png" alt="logo footer"></h5>
          </div>
          <div class="widget col-2">
            <div class="menu-footer">
                <?php
                        $defaults = array(
                            'theme_location'  => '',
                            'menu'            => '',
                            'container'       => 'ul',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'menu',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => '',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'depth'           => 0,
                            'walker'          => ''
                        );

                        wp_nav_menu( $defaults );
                    ?>
              
            </div>
              <p class="copyright"> <span>©</span>2016 <a href="rainchecklive.com">rainchecklive.com</a></p>
          </div>
        </div>
      </div>
    </footer>
    <!--javascript dev-->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-v1.11.2.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
    <?php wp_footer(); ?>
  </body>
</html>
