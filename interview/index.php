<?php
/**
 * Template Name: Interviews
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
$videos_result = interview_list_videos();
$json = json_decode($videos_result['body']);
$nextPageToken = $json->nextPageToken;
$totalResults = $json->pageInfo->totalResults;
$resultsPerPage = $json->pageInfo->resultsPerPage;
$items = $json->items;
$latest_video = $items[0];
unset($items[0]);
?> 
<section class="video-section">
  <div class="container">
      <iframe width="560" height="500" src="https://www.youtube.com/embed/<?php echo $latest_video->id->videoId;?>" frameborder="0" allowfullscreen></iframe>
  </div>
</section>
<div class="interviews-section">
  <div class="container">
    <h3>All Interviews</h3>
    <div class="interviews" id="video-list">
        <?php include 'items.php'; ?>
    </div>
    <?php if (isset($ytchag_next_token)): ?>
        <a class="ytc-paginationlink ytc-next watch-more" data-cid="<?php echo $ytchag_id ?>" data-wid="<?php echo $plugincount ?>" data-playlist="<?php echo $ytchag_playlist?>" data-token="<?php echo $ytchag_next_token?>">
            <?php echo ($ytchag_next_text ? $ytchag_next_text : _e('Next»', 'youtube-channel-gallery'))?>
        </a>
    <?php endif; ?>
    <?php if($totalResults > 0) { ?>
    <div class="more"><a href="javascript:void(0);" class="watch-more" data-token="<?php echo $nextPageToken;?>">watch more</a></div>
    <?php } ?>
  </div>
</div>
    
<?php
get_footer();
