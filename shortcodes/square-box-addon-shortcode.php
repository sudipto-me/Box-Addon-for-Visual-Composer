<?php
function vc_square_box_addon_shortcode_callback($atts, $content = NULL)
{
  ob_start();
  extract(shortcode_atts(array(
    'box_link'  => '',
    'box_title_color' =>  '',
    'box_title_font_size' => '',
    'box_background_color'  =>  '',
    'box_hover_background_color'  => '',
  ), $atts));
  $box_link  = vcbox_extract_string($box_link);
  $id = uniqid('sm-box-');

  $box_link_url = $box_link_text = $box_link_target = '';

  if (is_array($box_link) && count($box_link)) :
    $box_link_url = $box_link['url'];
    $box_link_text = $box_link['title'];
    $box_link_target = $box_link['target'];
  endif;

  $box_title_font_size = ($box_title_font_size != '') ? vcbox_px_checking($box_title_font_size) : '30px';
  $box_title_color = ($box_title_color != '') ? $box_title_color : '#ffffff';
  $box_background_color = ($box_background_color != '') ? $box_background_color : '#0074E8';
  $box_hover_background_color = ($box_hover_background_color != '') ? $box_hover_background_color : '#333333';

  ?>
<style media="screen">
<?php echo '#'. $id . ''?>.box__link a {
  background:
    <?php echo $box_background_color;
  ?>;
  color:
    <?php echo $box_title_color;
  ?>;
  font-size:
    <?php echo $box_title_font_size;
  ?>;
}

<?php echo '#'. $id . ''?>.box__link a:hover,
<?php echo '#'. $id . ''?>.box__link a:focus {
  background:
    <?php echo $box_hover_background_color;
  ?>;
}
</style>
<div id="<?php echo $id; ?>" class="box__link">
  <a href="<?php echo $box_link_url; ?>" target="<?php echo $box_link_target; ?>"><?php echo $box_link_text; ?>
  </a>
</div>
<?php
  wp_enqueue_style('vc-square-box-element-frontend');
  return ob_get_clean();
}
add_shortcode('vc_square_box_addon_shortcode', 'vc_square_box_addon_shortcode_callback');