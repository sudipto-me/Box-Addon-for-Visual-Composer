<?php
if (!defined('ABSPATH'))
  die('-1');

function vcbox_extract_string($input)
{
  $font_elements = explode('|', $input);
  $final_array =  array();
  foreach ($font_elements as $font_element) {
    if (!empty($font_element)) {
      $new_array = explode(':', $font_element);
      $final_array[$new_array[0]] = urldecode($new_array[1]);
    }
  }
  return $final_array;
}
function vcbox_google_font_style($google_final_array)
{
  $font_family = explode(':', $google_final_array['font_family']);
  $font_style = explode(':', $google_final_array['font_style']);
  $font_style_final = explode(' ', $font_style[0]);
  $font_style_final_check = ($font_style_final[1] == 'regular') ? 'normal' : $font_style_final[1];
  return $font = 'font-family:' . $font_family[0] . ';font-weight:' . $font_style_final[0] . ';font-style:' . $font_style_final_check . ';';
}
function vcbox_px_checking($str)
{
  $pos = strrpos($str, "px");
  if ($pos === false) {
    return $str . 'px';
  } else {
    return $str;
  }
}