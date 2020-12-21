<?php
add_action( 'wp_enqueue_scripts', 'add_my_script' );
function add_my_script() {
    wp_enqueue_script('jquery');
}


add_action( 'wp_ajax_get_more_post', 'get_more_post_func' );
add_action( 'wp_ajax_nopriv_get_more_post', 'get_more_post_func' );

function get_more_post_func() {

    $result = '';
    $query = new WP_Query( array( 'paged' => $_POST["page"] ) );

    foreach ($query->posts as $value) {
        $result .= '<li>'.$value->post_title.'</li>';
    }
    
    echo $result;

	wp_die();
}