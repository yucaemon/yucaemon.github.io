<?php 



register_sidebar();



add_theme_support( 'post-thumbnails' );



set_post_thumbnail_size( 544, 340, true ); 











if ( current_user_can('contributor') && !current_user_can('upload_files') )



    add_action('admin_init', 'allow_contributor_uploads');



  



  function allow_contributor_uploads() {



      $contributor = get_role('contributor');



      $contributor->add_cap('upload_files');



}







function time_ago( $type = 'post' ) {



	$d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';



	return human_time_diff($d('U'), current_time('timestamp')) . "" . __(' ago');



}







function exclude_other_posts( $wp_query ) {

    if ( isset( $_REQUEST['post_type'] ) && post_type_exists( $_REQUEST['post_type'] ) ) {

        $post_type = get_post_type_object( $_REQUEST['post_type'] );

        $cap_type = $post_type->cap->edit_other_posts;

    } else {

        $cap_type = 'edit_others_posts';

    }

 

    if ( is_admin() && $wp_query->is_main_query() && ! $wp_query->get( 'author' ) && ! current_user_can( $cap_type ) ) {

        $user = wp_get_current_user();

        $wp_query->set( 'author', $user->ID );

    }

}

add_action( 'pre_get_posts', 'exclude_other_posts' );





// フィルタの登録

add_filter('content_save_pre','test_save_pre');

 

function test_save_pre($content){

    global $allowedposttags;

 

    // iframeとiframeで使える属性を指定する

    $allowedposttags['iframe'] = array('class' => array () , 'src'=>array() , 'width'=>array(),

    'height'=>array() , 'frameborder' => array() , 'scrolling'=>array(),'marginheight'=>array(),

    'marginwidth'=>array());

 

    return $content;

}







?>