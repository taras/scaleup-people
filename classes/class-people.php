<?php
class ScaleUp_People {

  private $_args;

  private $_post_type;

  function __construct( $post_type, $args = array() ) {

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
        'add_new' => 'Add new person',
        'add_new_item' => 'Add New Person',
        'edit' => 'Edit',
        'edit_item' => 'Edit Person',
        'new_item' => 'New Person',
        'view' => 'View',
        'view_item' => 'View Person',
        'search_items' => 'Search People',
        'not_found' => 'People not found',
        'not_found_in_trash' => 'Person not in Trash',
        'parent' => 'Parent Person',
      ));

    $this->_args      = wp_parse_args( $args, $defaults );
    $this->_post_type = $post_type;

    add_action( 'init', array( $this, 'init') );
    add_action( 'register_schemas', array( $this, 'register_schemas') );

  }

  function init() {
    register_post_type( $this->_post_type, $this->_args );
  }

  /**
   * Register Person post type with schemas
   */
  function register_schemas() {

    $default = array(
      'table'   =>  'postmeta',
      'default' =>  '',
      'type'    =>  'text',
      'create'  =>  'add_post_meta',
      'read'    =>  'get_post_meta',
      'update'  =>  'update_post_meta',
      'delete'  =>  'delete_post_meta'
    );

    $fields = array();
    $properties = get_schema_fields( 'Person', true );
    foreach ( $properties as $property )
      $fields[ $property ] = $default;

    register_schema( 'Person', $this->_post_type, $fields );
  }

}