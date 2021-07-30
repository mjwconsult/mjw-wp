<?php
/**
 * Plugin Name: MJW Wordpress customisations
 * Plugin URI: https://mjw.pt
 * Description: Management, configuration and customisation provided by MJW
 * Author: MJW Consulting
 * Version: 1.0
 * Author URI: https://mjw.pt
 * License: AGPL3
 */

// Use REST API for mailing URLs - Description: Do not use extern paths use REST API
add_filter( 'civi_wp_rest/plugin/replace_mailing_tracking_urls', '__return_true' );

add_action( 'upgrader_process_complete', 'mjw_wp_upgrader_process_complete', 1000, 2 );

/**
 * https://developer.wordpress.org/reference/hooks/upgrader_process_complete/
 * @param $upgrader_object
 * @param $options
 */
function mjw_wp_upgrader_process_complete( $upgrader_object, $options ) {
  // Some bulk updates of plugins cause rewrite_rules (permalinks) to be broken.
  // This should provide a workaround/fix
  delete_option('civicrm_rules_flushed');
}
