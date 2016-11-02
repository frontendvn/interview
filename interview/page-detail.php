<?php
/**
 * Template Name: Detail
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
<?php

    $url = "https://www.googleapis.com/youtube/v3/videos?id=".filter_input(INPUT_GET, 'v')."&key=".get_option('ytchag_key')."&part=snippet,contentDetails,statistics,status";
    $response = wp_remote_get($url);
    $item = json_decode($response['body']);
    $item = !empty($item->items) ? reset($item->items) : '';
    
?>

<div class="detail-section">
    <div class="container">
      <div class="title">
          <h1><?php echo sanitize_title($item->snippet->title) ?></h1>
      </div>
      <div class="wrapper-detail">
        <div class="left">
          <div class="video"><iframe width="853" height="480" src="https://www.youtube.com/embed/<?php echo $item->id;?>" frameborder="0" allowfullscreen></iframe></div>
          <div class="decs">
              <p><?php echo sanitize_text_field($item->snippet->description) ?></p>
              <p>View more: <a target="_blank" href="https://www.youtube.com/channel/<?php echo $item->snippet->channelId; ?>"><?php echo $item->snippet->channelTitle; ?></a></p>
          </div>
          <div class="comment-section">
            <h3 class="title">Comments :</h3>
            <div class="comment-thread-renderer">
                <div id="fb-root"></div>
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=320018248346363";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-comments" data-href="<?php echo site_url().'/detail/?v='.$item->id;?>" data-width="100%" data-numposts="5"></div>

            </div>
          </div>

        </div>
        <?php get_template_part( 'related' ); ?>
      </div>
    </div>
  </div>