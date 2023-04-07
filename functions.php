<?php

function mytheme_support(){
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support( 'post-thumbnails' );
  
}
add_action('after_setup_theme', 'mytheme_support');


function mytheme_styles() {

  $version = wp_get_theme()->get('Version');
  wp_enqueue_style( 'mytheme-style', get_template_directory_uri() . '/style.css', array('mytheme-bootstrap'), $version );
  wp_enqueue_style( 'mytheme-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1' );
  wp_enqueue_style( 'mytheme-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );
  
}
add_action( 'wp_enqueue_scripts', 'mytheme_styles' );

function mytheme_script() {
  
  wp_enqueue_script( 'mytheme-bootstrapScript', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true );
  wp_enqueue_script( 'mytheme-jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', array(), '2.2.0', true);
  wp_enqueue_script( 'mytheme-javascript', get_template_directory_uri().'/myjavascript.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'mytheme_script' );


function mytheme_register_menus(){
  $locations = array(
      'primary' => "Left Menu",
      'secondary' => "Right Menu",
      'footer' => "footer menu items"
  );
  register_nav_menus($locations);
}
add_action('init', "mytheme_register_menus");


function car_custom_post_type() {
  $labels = array(
      'name' => __( 'car', 'mytheme' ),
      'singular_name' => __( 'car', 'mytheme' ),
      'menu_name' => __( 'car', 'mytheme' ),
      'add_new' => __( 'Add New', 'mytheme' ),
      'add_new_item' => __( 'Add New car', 'mytheme' ),
      'edit_item' => __( 'Edit car', 'mytheme' ),
      'new_item' => __( 'New car', 'mytheme' ),
      'view_item' => __( 'View car', 'mytheme' ),
      'search_items' => __( 'Search car', 'mytheme' ),
      'not_found' => __( 'No Car found', 'mytheme' ),
      'not_found_in_trash' => __( 'No car found in trash', 'mytheme' ),
  );
  $args = array(
      'labels' => $labels,
      'public' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-car',
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
      
      'has_archive' => true,
      'rewrite' => array( 'slug' => 'car' ),
  );
  register_post_type( 'car', $args );
}
add_action( 'init', 'car_custom_post_type' );


function create_taxonomy() {
  register_taxonomy(
    'car-category',
    'car',
    array(
      'label' => __( 'Car Categories' ),
      'rewrite' => array( 'slug' => 'car-category' ),
      'hierarchical' => true,
    )
  );
}
add_action( 'init', 'create_taxonomy' );

function add_taxonomy_to_post_type() {
  register_taxonomy_for_object_type( 'car-category', 'car' );
}
add_action( 'init', 'add_taxonomy_to_post_type' );



function get_custom_taxonomy_terms() {
  $terms = get_terms( array(
    'taxonomy' => 'car-category',
    'hide_empty' => true,
  ) );
  return $terms;
}

function add_custom_taxonomy_to_menu( $items, $args ) {
  if ( $args->theme_location == 'secondary' ) {
    $terms = get_custom_taxonomy_terms();
    foreach ( $terms as $term ) {
      $items .= '<li><a href="' . get_term_link( $term ) . '">' . $term->name . '</a></li>';
    }
  }
  return $items;
}
add_filter( 'wp_nav_menu_items', 'add_custom_taxonomy_to_menu', 10, 2 );

function like_post() {
  $post_id = $_POST['post_id'];
  $likes = get_post_meta($post_id, 'likes', true);
  $likes++;
  update_post_meta($post_id, 'likes', $likes);
  echo $likes;
  wp_die();
}

function dislike_post() {
  $post_id = $_POST['post_id'];
  $dislikes = get_post_meta($post_id, 'dislikes', true);
  $dislikes++;
  update_post_meta($post_id, 'dislikes', $dislikes);
  echo $dislikes;
  wp_die();
}

add_action('wp_ajax_like_post', 'like_post');
add_action('wp_ajax_dislike_post', 'dislike_post');



add_action('wp_enqueue_scripts', 'enqueue_jquery_form');

function enqueue_jquery_form(){
  wp_enqueue_script('jquery-form');
}

add_action('wp_ajax_create_applicant', 'create_applicant');
function create_applicant(){
  wp_send_json_success(array("POST" => $_POST, "FILES"=>$_FILES ));
}

//post from frontend

if ( isset( $_POST['post_title'] ) ) {

  // Create a new post object
  $new_post = array(
      'post_title'    => wp_strip_all_tags( $_POST['post_title'] ),
      // 'post_content'  => $_POST['post_content'],
      'post_type'     => 'car',
      'post_status'   => 'publish',
      'meta_input'    => array(
          'car_price'  => wp_strip_all_tags( $_POST['car_price'] ),
          'place' => wp_strip_all_tags( $_POST['place'] ),
          'avatar'  => wp_strip_all_tags( $_POST['avatar'] ),
          'price_value' => wp_strip_all_tags( $_POST['price_value'] ),
          'dimensions' => wp_strip_all_tags( $_POST['dimensions'] ),
          'displacement' => wp_strip_all_tags( $_POST['displacement'] ),
          'horse_power' => wp_strip_all_tags( $_POST['horse_power'] ),
          'fuelType' => wp_strip_all_tags( $_POST['fuelType'] ),
          'fuelTankCapacity' => wp_strip_all_tags( $_POST['fuelTankCapacity'] ),
          'topSpeed' => wp_strip_all_tags( $_POST['topSpeed'] ),
          'seatingCapacity' => wp_strip_all_tags( $_POST['seatingCapacity'] ),
      
        ),
  );

  // Insert the post into the database
  $post_id = wp_insert_post( $new_post );

  // Redirect to the new post on success
  if ( $post_id ) {
      wp_redirect( get_permalink( $post_id ) );
      exit;
  }

}




?>