<?php foreach($items as $item) {
//print_r($item->snippet->thumbnails);die;
 ?>
<div class="interview">
  <div class="wrapper"><a href="<?php echo site_url().'/detail/?v='.$item->id->videoId;?>"><img src="<?php echo $item->snippet->thumbnails->medium->url ?>"></a>
    <div class="box-title">
      <h2 class="title"> <a href="<?php echo site_url().'/detail/?v='.$item->id->videoId;?>"><?php echo $item->snippet->title;?></a></h2>
    </div>
    <div class="icon-play"><img src="<?php echo get_template_directory_uri(); ?>/img/inter/play.png" alt="play"></div>
  </div>
</div>
<?php } ?>
