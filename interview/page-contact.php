<?php

/**
 * Template Name: Contact
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

<section class="contact-section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="contact-page">
            <h1>CONTACT ME FOR MORE</h1>
            <?php echo  do_shortcode('[contact-form-7 id="4" title="Contact form 1"]');?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
get_footer();
