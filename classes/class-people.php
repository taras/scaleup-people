<?php
class ScaleUp_People {

  private $_args;

  function __construct( $args = array() ) {

    $defaults = array(
      'label' => 'People',
      'description' => '',
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'rewrite' => array( 'slug' => '' ),
      'query_var' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'supports' => array( 'editor', 'excerpt', ),
      'labels' => array(
        'name' => 'People',
        'singular_name' => 'Person',
        'menu_name' => 'People',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Person',
        'edit' => 'Edit',
        'edit_item' => 'Edit Person',
        'new_item' => 'New Person',
        'view' => 'View',
        'view_item' => 'View Person',
        'search_items' => 'Search People',
        'not_found' => 'Person not found',
        'not_found_in_trash' => 'Person not in Trash',
        'parent' => 'Parent Person',
      ));

    $this->_args = wp_parse_args( $args, $defaults );

    add_action( 'init', array( $this, 'init') );

  }

  function init() {

    // register Person Post Type
    $post_type = apply_filters( 'scaleup_people_person_post_type', 'person' );
    register_post_type( $post_type, $this->_args );

  }

}