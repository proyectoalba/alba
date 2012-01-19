<?php

function init_media_library()
{
  sfContext::getInstance()->getResponse()->addJavascript('/sfMediaLibraryPlugin/js/main', 'last');
  $url = url_for('sfMediaLibrary/choice');
  $js = 'sfMediaLibrary.init(\''.$url.'\')';
  
  return javascript_tag($js);
}

function input_asset_tag($name, $value, $options = array())
{
  use_helper('Javascript');
  
  $type = 'all';
  if (isset($options['images_only']))
  {
    $type = 'image';
    unset($options['images_only']);
  }
  
  $form_name = 'this.previousSibling.previousSibling.form.name';
  if (isset($options['form_name']))
  {
    $form_name = '\''.$options['form_name'].'\'';
    unset($options['form_name']);
  }
    
  $html = '';

  if (is_file(sfConfig::get('sf_web_dir').$value))
  {
    $ext  = substr($value, strpos($value, '.') - strlen($value) + 1);
    if (in_array($ext, array('png', 'jpg', 'gif')))
    {
      $image_path = $value;
    }
    else
    {
      if (!is_file(sfConfig::get('sf_plugins_dir').'/sfMediaLibraryPlugin/web/images/'.$ext.'.png'))
      {
        $ext = 'unknown';
      }
      $image_path = '/sfMediaLibraryPlugin/images/'.$ext;
    }
    $html .= link_to_function(image_tag($image_path, array('alt' => 'File', 'height' => '64')), "window.open('$value')");
    $html .= '<br />';
  }

  $html .= input_tag($name, $value, $options);
  $html .= '&nbsp;'.image_tag('/sfMediaLibraryPlugin/images/folder_open', array('alt' => __('Insert Image'), 'style' => 'cursor: pointer; vertical-align: middle', 'onclick' => 'sfMediaLibrary.openWindow({ form_name: '.$form_name.', field_name: \''.$name.'\', type: \''.$type.'\', scrollbars: \'yes\' })'));
  $html .= init_media_library();

  return $html;
}
