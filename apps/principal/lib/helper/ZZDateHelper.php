<?php
function zz_input_date_tag($name, $value, $options = array()) {
  $options = _parse_attributes($options);

  $context = sfContext::getInstance();
  if (isset($options['culture']))
  {
    $culture = $options['culture'];
    unset($options['culture']);
  }
  else
  {
    $culture = $context->getUser()->getCulture();
  }

  // rich control?
  $rich = false;
  if (isset($options['rich']))
  {
    $rich = $options['rich'];
    unset($options['rich']);
  }

  if (!$rich)
  {
    throw new sfException('input_date_tag (rich=off) is not yet implemented');
  }

  $date_pattern = 'p';
  if (isset($options['date_pattern'])) {
    $date_pattern = $options['date_pattern'];
    unset($options['date_pattern']);
  }

  // parse date
  if (($value === null) || ($value === ''))
  {
    $value = '';
  }
  else
  {
    $dateFormat = new sfDateFormat($culture);
    $value = $dateFormat->format($value, $date_pattern);
  }

  // register our javascripts and stylesheets
  $langFile = '/sf/js/calendar/lang/calendar-'.strtolower(substr($culture, 0, 2));
  $jss = array(
    '/sf/js/calendar/calendar',
    is_readable(sfConfig::get('sf_symfony_data_dir').'/web/'.$langFile.'.js') ? $langFile : '/sf/js/calendar/lang/calendar-en',
    '/sf/js/calendar/calendar-setup',
  );
  foreach ($jss as $js)
  {
    $context->getResponse()->addJavascript($js);
  }
  $context->getResponse()->addStylesheet('/sf/js/calendar/skins/aqua/theme');

  // date format
  $dateFormatInfo = sfDateTimeFormatInfo::getInstance($culture);
  $date_format = strtolower($dateFormatInfo->getShortDatePattern());

  // calendar date format
  $calendar_date_format = $date_format;
  $calendar_date_format = strtr($calendar_date_format, array('M' => 'm', 'y' => 'Y'));
  $calendar_date_format = preg_replace('/([mdy])+/i', '%\\1', $calendar_date_format);

  $js = '
    document.getElementById("trigger_'.$name.'").disabled = false;
    Calendar.setup({
      inputField : "'.get_id_from_name($name).'",
      ifFormat : "'.$calendar_date_format.'",
      button : "trigger_'.$name.'"
    });
  ';

  // construct html
  if (!isset($options['size']))
  {
    $options['size'] = 9;
  }
  $html = input_tag($name, $value, $options);

  // calendar button
  $calendar_button = '...';
  $calendar_button_type = 'txt';
  if (isset($options['calendar_button_img']))
  {
    $calendar_button = $options['calendar_button_img'];
    $calendar_button_type = 'img';
    unset($options['calendar_button_img']);
  }
  else if (isset($options['calendar_button_txt']))
  {
    $calendar_button = $options['calendar_button_txt'];
    $calendar_button_type = 'txt';
    unset($options['calendar_button_txt']);
  }

  if ($calendar_button_type == 'img')
  {
    $html .= image_tag($calendar_button, array('id' => 'trigger_'.$name, 'style' => 'cursor: pointer; vertical-align: middle'));
  }
  else
  {
    $html .= content_tag('button', $calendar_button, array('type' => 'button', 'disabled' => 'disabled', 'onclick' => 'return false', 'id' => 'trigger_'.$name));
  }

  if (isset($options['with_format']))
  {
    $html .= '('.$date_format.')';
    unset($options['with_format']);
  }

  // add javascript
  $html .= content_tag('script', $js, array('type' => 'text/javascript'));

  return $html;
}
?>
