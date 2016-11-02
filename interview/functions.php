<?php
/**
 * interview functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package interview
 */

/**
 * Enqueue scripts and styles.
 */
function interview_scripts() {
    wp_enqueue_style( 'interview-style-bootstrap', get_template_directory_uri() . '/style/bootstrap.min.css');
    wp_enqueue_style( 'interview-style', get_stylesheet_uri() );
    wp_enqueue_script( 'interview-skip-link-focus-fix', 'https://www.google.com/recaptcha/api.js');

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'interview_scripts' );


add_action( 'init', 'interview_script_enqueuer' );

function interview_script_enqueuer() {
    wp_register_script( "interview_script", get_template_directory_uri().'/js/main.js', array('jquery') );
   
   $protocol = isset( $_SERVER['HTTPS'] ) ? 'https://' : 'http://';
    $params = array(
        'ajaxurl' => admin_url( 'admin-ajax.php', $protocol ),
    );

    wp_localize_script( 'interview_script', 'base_url', $params );
    
    wp_enqueue_script( 'interview_script' );
}

/**
 * 
 * @return list video
 */
function interview_list_videos() {
    $interview = new Interview();
    return $interview->getVideos();
}


add_action("wp_ajax_interview_next_videos", "interview_next_videos");
// permiss call ajax if not login yet
add_action( 'wp_ajax_nopriv_interview_next_videos', 'interview_next_videos' );
function interview_next_videos() {
    $token = filter_input(INPUT_POST, 'token');
    $interview = new Interview();
    $videos_result = $interview->getVideos($token);
    $json = json_decode($videos_result['body']);
    $nextPageToken = $json->nextPageToken;
    $items = $json->items;
    ob_start();
    include 'items.php';
    $content = ob_get_contents();
    ob_end_clean();    
    echo json_encode(array('content' => $content, 'nextPageToken' => $nextPageToken));
    wp_die();
}