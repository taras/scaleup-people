<?php
/**
 * Plugin Name: ScaleUp People
 */

define( 'SCALEUP_PEOPLE_DIR', dirname( __FILE__ ) );
define( 'SCALEUP_PEOPLE_VER', '0.1.0' );
define( 'SCALEUP_PEOPLE_MIN_PHP', '5.2.4' );
define( 'SCALEUP_PEOPLE_MIN_WP', '3.4' );

include( SCALEUP_PEOPLE_DIR . '/classes/class-people.php' );
include( SCALEUP_PEOPLE_DIR . '/classes/class-plugin-base.php' );

new ScaleUp_People_Plugin();