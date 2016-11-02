<?php 
//    $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&relatedToVideoId=". filter_input(INPUT_GET, 'v')."&type=video&maxResults=6&key=".get_option('ytchag_key');
//    $response = wp_remote_get($url);
//    
//    $list = json_decode($response['body']);
//    
//    $items = !empty($list->items) ? $list->items : '';
    
$videos_result = interview_list_videos();
$json = json_decode($videos_result['body']);
$nextPageToken = $json->nextPageToken;
$totalResults = $json->pageInfo->totalResults;
$resultsPerPage = $json->pageInfo->resultsPerPage;
$items = $json->items;
//$latest_video = $items[0];
//unset($items[0]);
$current_video = filter_input(INPUT_GET, 'v');
?>
<div class="right">
    <div class="sidebar-modules">
      <h4 class="watch-sidebar-head">More interviews</h4>
      <div class="watch-sidebar-section">
        <ul class="video-list">
            
            <?php 
            if (!empty($items)) {
            foreach($items as $item) { 
                if ($item->id->videoId == $current_video)                    
                    continue;
                ?>
                <li class="video-list-item related-list-item">
                  <div class="wrapper"><a href="<?php echo site_url().'/detail/?v='.$item->id->videoId;?>"><img src="<?php echo $item->snippet->thumbnails->medium->url; ?>"></a>
                    <div class="box-title">
                      <h2 class="title"> <a href="<?php echo site_url().'/detail/?v='.$item->id->videoId;?>"><?php echo sanitize_title($item->snippet->title); ?></a></h2>
                    </div>
                    <div class="icon-play"><a href="<?php echo site_url().'/detail/?v='.$item->id->videoId;?>"><img src="<?php echo get_template_directory_uri(); ?>/img/inter/play.png" alt="play"></a></div>
                  </div>
                </li>
            <?php }
            }
            ?>
        </ul>
      </div>
    </div>
    </div>
