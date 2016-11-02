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
          <ul class="infor">
            <li> You probably introduced yourself in your first Tumblr entry, but if you post regularly, the information is soon buried out of sight of your existing and potential customers. </li>
            <li>While most of Tumblr's themes don't come with extra pages, such as an About Me page, you can edit your blog's theme to include one.</li>
            <li> Adding a new page to your Tumblr blog is only slightly more complicated than adding a new post.</li>
            <li>Email: rainchecklive@abc.com</li>
            <li>Phone: 08xx-000-000000</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
