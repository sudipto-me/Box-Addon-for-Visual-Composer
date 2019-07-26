<?php
if (!defined('ABSPATH'))
  die('-1');

function vc_border_box_addon_shortcode_callback($atts, $content = NULL)
{
  ob_start();
  extract(shortcode_atts(array(
    'box_border_color'  => '',
    'box_border_width'  =>  '',
    'box_min_height_desktop'  => '',
    'box_min_height_laptop'  => '',
    'box_min_height_tab'  => '',
    'box_min_height_mobile'  => '',
    'box_title_text'  => '',
    'title_bg_color'  =>  '',
    'title_text_align'  =>  '',
    'title_min_height'  => '',
    'title_color' =>  '',
    'title_font_size' => '',
    'title_font_size_laptop'  => '',
    'title_font_size_tab'  => '',
    'title_font_size_mobile'  => '',
    'anchor_enable_disable' =>  '',
    'anchor_text_link'  => '',
    'anchor_class'  => ''
  ), $atts));
  $uniqid =  uniqid('big-box-');
  $box_border_color = ($box_border_color != '') ? $box_border_color : '#0074E8';
  $box_border_width = ($box_border_width != '') ? vcbox_px_checking($box_border_width) : '5px';
  $box_min_height_desktop = ($box_min_height_desktop != '') ? vcbox_px_checking($box_min_height_desktop) : '300px';
  $box_min_height_laptop = ($box_min_height_laptop != '') ? vcbox_px_checking($box_min_height_laptop) : '300px';
  $box_min_height_tab = ($box_min_height_tab != '') ? vcbox_px_checking($box_min_height_tab) : '300px';
  $box_min_height_mobile = ($box_min_height_mobile != '') ? vcbox_px_checking($box_min_height_mobile) : '300px';

  $box_title_text = ($box_title_text != '') ? $box_title_text : 'This is Title';
  $title_bg_color = ($title_bg_color != '') ? $title_bg_color : '#0074E8';
  $title_text_align = ($title_text_align != '') ? $title_text_align : 'left';
  $title_min_height = ($title_min_height != '') ? vcbox_px_checking($title_min_height) : '84px';
  $title_color = ($title_color != '') ? $title_color : '#ffffff';
  $title_font_size = ($title_font_size != '') ? vcbox_px_checking($title_font_size) : '25px';
  $title_font_size_laptop = ($title_font_size_laptop != '') ? vcbox_px_checking($title_font_size_laptop) : '25px';
  $title_font_size_tab = ($title_font_size_tab != '') ? vcbox_px_checking($title_font_size_tab) : '25px';
  $title_font_size_mobile = ($title_font_size_mobile != '') ? vcbox_px_checking($title_font_size_mobile) : '25px';

  // $description_text = ($description_text != '') ? $description_text : '';

  $anchor_enable_disable = ($anchor_enable_disable != '') ? $anchor_enable_disable : '';
  $anchor_link = $anchor_text = $anchor_target = '';
  if (isset($anchor_enable_disable) && $anchor_enable_disable === 'yes') {
    $anchor_text_link = vcbox_extract_string($anchor_text_link);

    if (is_array($anchor_text_link) && count($anchor_text_link) > 0) {
      $anchor_link = ($anchor_text_link['url'] != '') ? $anchor_text_link['url'] : '#';
      $anchor_text = ($anchor_text_link['title'] != '') ? $anchor_text_link['title'] : 'Link Text';
      $anchor_target = ($anchor_text_link['target'] != '') ? preg_replace('/\s+/', '', $anchor_text_link['target']) : '_blank';
    }
    $anchor_class = ($anchor_class != '') ? $anchor_class : '';
  } ?>
<style media="screen">
<?php echo '#'. $uniqid . ''?>.bordered__box {
  border-width:
    <?php echo $box_border_width;
  ?>;
  border-style:
    solid;
  border-color:
    <?php echo $box_border_color ?>;
  min-height:
    <?php echo $box_min_height_desktop;
  ?>;
}

<?php echo '#'. $uniqid . ''?>.bordered__box h2 {
  background:
    <?php echo $title_bg_color;
  ?>;
  text-align:
    <?php echo $title_text_align;
  ?>;
  min-height:
    <?php echo $title_min_height ?>;
  color:
    <?php echo $title_color;
  ?>;
  font-size:
    <?php echo $title_font_size;
  ?>;
}

@media (max-width:1199px) {
  <?php echo '#'. $uniqid . ''?>.bordered__box {
    min-height:
      <?php echo $box_min_height_laptop;
    ?>;
  }

  <?php echo '#'. $uniqid . ''?>.bordered__box h2 {
    font-size:
      <?php echo $title_font_size_laptop;
    ?>;
  }
}

@media (max-width:991px) {
  <?php echo '#'. $uniqid . ''?>.bordered__box {
    min-height:
      <?php echo $box_min_height_tab;
    ?>;
  }

  <?php echo '#'. $uniqid . ''?>.bordered__box h2 {
    font-size:
      <?php echo $title_font_size_tab;
    ?>;
  }
}

@media (max-width:767px) {
  <?php echo '#'. $uniqid . ''?>.bordered__box {
    min-height:
      <?php echo $box_min_height_mobile;
    ?>;
  }

  <?php echo '#'. $uniqid . ''?>.bordered__box h2 {
    font-size:
      <?php echo $title_font_size_mobile;
    ?>;
  }
}
</style>
<div id="<?php echo $uniqid; ?>" class="bordered__box">
  <h2><?php echo $box_title_text; ?></h2>
  <p><?php echo $content; ?></p>
  <?php if (isset($anchor_enable_disable) && $anchor_enable_disable === 'yes') { ?>
  <a href="<?php echo $anchor_link; ?>" class="<?php echo $anchor_class; ?>"
    target="<?php echo $anchor_target; ?>"><?php echo $anchor_text; ?></a>
  <?php } ?>
</div>
<?php

  wp_enqueue_style('vc-border-box-element-frontend');
  return ob_get_clean();
}
add_shortcode('vc_border_box_addon_shortcode', 'vc_border_box_addon_shortcode_callback');