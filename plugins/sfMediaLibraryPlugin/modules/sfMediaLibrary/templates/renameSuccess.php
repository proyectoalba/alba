<?php use_helper('Javascript', 'I18N') ?>

<?php include_partial('sfMediaLibrary/block', array(
  'name' => $name,
  'current_path' => $current_path,
  'web_abs_current_path' => $web_abs_current_path,
  'type' => $type,
  'info' => $info,
  'count' => $count,
)) ?>