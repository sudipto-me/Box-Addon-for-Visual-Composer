<?php
if (!defined('ABSPATH'))
  die('-1');
require_once(VC_BOX_PLUGIN_DIR . '/shortcodes/border-box-addon-shortcode.php');
function vc_border_box_addon_vc_map()
{
  vc_map(array(
    'name'  => 'Content Box',
    'description' => 'Content Box Addon For Clearagain Media',
    'class' => 'vc_border_box_addon',
    'show_settings_on_create' => true,
    'base' => 'vc_border_box_addon_shortcode',
    'category' => __('Content', 'js_composer'),
    'icon'  => VC_BOX_PLUGIN_URL . '/assets/img/square-box.png',
    'params'  => array(
      array(
        'type'  => 'colorpicker',
        'heading' => __('Box Border Color', 'js_composer'),
        'param_name' => 'box_border_color',
        'value' => '#0074E8',
        'description' => __('Enter border color.', 'js_composer')
      ),
      array(
        'type'  => 'textfield',
        'heading' => __('Box Border Width', 'js_composer'),
        'param_name' => 'box_border_width',
        'value' => '5px',
        'description' => __('Enter border width.', 'js_composer')
      ),
      array(
        'type'  => 'textfield',
        'heading' => __('Minimum Height', 'js_composer'),
        'param_name' => 'box_min_height_desktop',
        'value' => '300px',
        'edit_field_class' => 'vc_col-sm-3',
        'description' => __('Desktop', 'js_composer'),
      ),
      array(
        'type'  => 'textfield',
        'heading' => __('', 'js_composer'),
        'description' => __('Laptop', 'js_composer'),
        'param_name' => 'box_min_height_laptop',
        'value' => '300px',
        'edit_field_class' => 'vc_col-sm-3 title_custom_height',
      ),
      array(
        'type'  => 'textfield',
        'heading' => __('', 'js_composer'),
        'description' => __('Tab', 'js_composer'),
        'param_name' => 'box_min_height_tab',
        'value' => '300px',
        'edit_field_class' => 'vc_col-sm-3 title_custom_height',
      ),
      array(
        'type'  => 'textfield',
        'heading' => __('', 'js_composer'),
        'description' => __('Mobile', 'js_composer'),
        'param_name' => 'box_min_height_mobile',
        'value' => '300px',
        'edit_field_class' => 'vc_col-sm-3 title_custom_height',
      ),

      array(
        'type'  => 'textfield',
        'heading' => __('Box Title', 'js_composer'),
        'param_name' => 'box_title_text',
        'value' => __('This is title', 'js_composer'),
        'description' => __('Enter box title.', 'js_composer'),
        'group' => 'Title',
      ),
      array(
        'type'  => 'colorpicker',
        'heading' => __('Box Title Background Color', 'js_composer'),
        'param_name' => 'title_bg_color',
        'value' => '#0074E8',
        'description' => __('Enter box title background color.', 'js_composer'),
        'group' => 'Title',
      ),
      array(
        'type'  => 'dropdown',
        'heading' => __('Box Title Alignment', 'js_composer'),
        'param_name' => 'title_text_align',
        'value' => array(
          __('Left', 'js_composer') => 'left',
          __('Center', 'js_composer') => 'center',
          __('Right', 'js_composer') => 'right',
        ),
        'default' => 'center',
        'description' => __('Enter box title alignment.', 'js_composer'),
        'group' => 'Title',
      ),
      array(
        'type'  => 'textfield',
        'heading' => __('Box Title Minimum Height', 'js_composer'),
        'param_name' => 'title_min_height',
        'value' => '80px',
        'description' => __('Enter box title minimum height.', 'js_composer'),
        'group' => 'Title',
      ),
      array(
        'type'  => 'colorpicker',
        'heading' => __('Box Title Color', 'js_composer'),
        'param_name'  => 'title_color',
        'value' => '#ffffff',
        'description' => __('Enter Box title color', 'js_composer'),
        'group' => 'Title',
      ),
      array(
        'type'  => 'textfield',
        'heading' => __('Box Title Font Size', 'js_composer'),
        'param_name'  => 'title_font_size',
        'value' => '25px',
        'description' => __('Desktop', 'js_composer'),
        'edit_field_class' => 'vc_col-sm-3',
        'group' => 'Title',
      ),
      array(
        'type'  => 'textfield',
        'heading' => __('', 'js_composer'),
        'param_name'  => 'title_font_size_laptop',
        'value' => '25px',
        'description' => __('Laptop', 'js_composer'),
        'edit_field_class' => 'vc_col-sm-3 title_custom_height',
        'group' => 'Title',
      ),
      array(
        'type'  => 'textfield',
        'heading' => __('', 'js_composer'),
        'param_name'  => 'title_font_size_tab',
        'value' => '25px',
        'description' => __('Tab', 'js_composer'),
        'edit_field_class' => 'vc_col-sm-3 title_custom_height',
        'group' => 'Title',
      ),
      array(
        'type'  => 'textfield',
        'heading' => __('', 'js_composer'),
        'param_name'  => 'title_font_size_mobile',
        'value' => '25px',
        'description' => __('Mobile', 'js_composer'),
        'edit_field_class' => 'vc_col-sm-3 title_custom_height',
        'group' => 'Title',
      ),
      array(
        'type'  => 'textarea_html',
        'heading' => __('Box Description Text', 'js_composer'),
        'param_name'  => 'content',
        'value' => "",
        'description' => __('Enter Box description', 'js_composer'),
        'group' => 'Description',
      ),
      array(
        'type'  => 'checkbox',
        'heading' => __('Show or Hide Link', 'js_composer'),
        'param_name' => 'anchor_enable_disable',
        'value' => array(__('Enable', 'js_composer') => 'yes'),
        'default' => 'yes',
        'description' => __('Check the box to enable the link settings.', 'js_composer'),
        'group' => 'Link',
      ),
      array(
        'type'  => 'vc_link',
        'heading' => __('Link Text and Link', 'js_composer'),
        'param_name'  => 'anchor_text_link',
        'dependency' => array(
          'element' => 'anchor_enable_disable',
          'value' => 'yes',
        ),
        'group' => 'Link',
      ),
      array(
        'type'  => 'textfield',
        'heading' => __('Link Extra Class', 'js_composer'),
        'param_name'  => 'anchor_class',
        'dependency' => array(
          'element' => 'anchor_enable_disable',
          'value' => 'yes',
        ),
        'value' => '',
        'group' => 'Link',
      ),





    ),
  ));
}
add_action('vc_before_init', 'vc_border_box_addon_vc_map');