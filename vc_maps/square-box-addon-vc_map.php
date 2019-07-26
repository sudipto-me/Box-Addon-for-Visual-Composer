<?php
if (!defined('ABSPATH'))
  die('-1');

require_once(VC_BOX_PLUGIN_DIR . '/shortcodes/square-box-addon-shortcode.php');
function vc_square_box_addon_vc_map()
{
  vc_map(array(
    'name' => 'Button Box',
    'description' => 'Button Box Addon For Clearagain Media',
    'class' => 'vc_small_box_addon',
    'show_settings_on_create' => true,
    'base' => 'vc_square_box_addon_shortcode',
    'category' => __('Content', 'js_composer'),
    'icon'  => VC_BOX_PLUGIN_URL . '/assets/img/square-box.png',
    'params'  => array(
      array(
        'type'  => 'vc_link',
        'heading' => __('Box Title and Link', 'js_composer'),
        'param_name' => 'box_link',
        'value' => '',
        'description' => __('Enter box link.', 'js_composer'),
      ),
      array(
        'type'  => 'textfield',
        'heading' => __('Font Size', 'js_composer'),
        'param_name' => 'box_title_font_size',
        'value' => '',
        'description' => __('Enter box title font size.', 'js_composer'),
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Font Color", "js_composer"),
        "param_name" => "box_title_color",
        "value" => '#fff',
        "description" => __("Choose box title color", "js_composer")
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Box Background Color", "js_composer"),
        "param_name" => "box_background_color",
        "value" => '#0074E8',
        "description" => __("Choose box background color", "js_composer")
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Box Background Hover Color", "js_composer"),
        "param_name" => "box_hover_background_color",
        "value" => '#333333',
        "description" => __("Choose box hover background color", "js_composer")
      ),
    ),
  ));
}
add_action('vc_before_init', 'vc_square_box_addon_vc_map');