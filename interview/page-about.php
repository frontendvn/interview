<?php
/**
 * Template Name: About
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package interview
 */
get_header(); ?>

<section class="about-section">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-md-push-7">
        <div class="img-about"><img src="<?php echo get_template_directory_uri(); ?>/img/about/1.png" alt="about"></div>
      </div>
      <div class="col-md-7 col-md-pull-5">
        <div class="infor-about">
          <h1>About Me</h1>
          <?php 
          $page_slug ='about';
            $page_data = get_page_by_path($page_slug);

            echo apply_filters('the_content', $page_data->post_content);
          ?>
          
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
