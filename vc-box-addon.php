<?php
/*
Plugin Name:  VC Box Addon Section
Plugin URI:   http://www.wphats.com/
Description:  Visual Composer Addon for Box element.
Version:      1.0
Author:       Mehedi Hasan
Author URI:   http://www.wphats.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  vc-box
Domain Path:  /languages
*/
if (!defined('ABSPATH'))
  die('-1');

function vc_box_addon_active()
{
  // checking if visual composer is active
  if (!is_plugin_active('js_composer/js_composer.php')) {
    wp_die('Please activate Visual Composer, and try again');
  }
}
register_activation_hook(__FILE__, 'vc_box_addon_active');

/* -----------------------------------------------------------------------------
 * DEFINE CONSTANTS
 * -------------------------------------------------------------------------- */
define('VC_BOX_PLUGIN_SLUG', plugin_basename(__FILE__));
define('VC_BOX_PLUGIN_DIR', untrailingslashit(plugin_dir_path(__FILE__)));
define('VC_BOX_PLUGIN_URL', untrailingslashit(plugins_url(basename(plugin_dir_path(__FILE__)), basename(__FILE__))));

function vc_box_enqueue_script()
{
  wp_register_style('vc-square-box-element-frontend', VC_BOX_PLUGIN_URL . '/assets/css/vc-square-box-element.css', '', time(), 'all');
  wp_register_style('vc-border-box-element-frontend', VC_BOX_PLUGIN_URL . '/assets/css/vc-border-box-element.css', '', time(), 'all');
}
add_action('wp_enqueue_scripts', 'vc_box_enqueue_script');

function vc_box_admin_enqueue_script()
{
  wp_enqueue_style('vc-box-element-admin', VC_BOX_PLUGIN_URL . '/assets/admin/vc-box-admin.css', '', time(), 'all');
}
add_action('admin_enqueue_scripts', 'vc_box_admin_enqueue_script');

/* -----------------------------------------------------------------------------
 * Adding required php files
 * -------------------------------------------------------------------------- */
require_once(VC_BOX_PLUGIN_DIR . '/required-functions.php');

require_once(VC_BOX_PLUGIN_DIR . '/vc_maps/square-box-addon-vc_map.php');

require_once(VC_BOX_PLUGIN_DIR . '/vc_maps/border-box-addon-vc_map.php');