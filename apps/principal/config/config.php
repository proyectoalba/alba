<?php

// include project configuration
include(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

// symfony bootstraping
require_once($sf_symfony_lib_dir.'/util/sfCore.class.php');
sfCore::bootstrap($sf_symfony_lib_dir, $sf_symfony_data_dir);

sfConfig::add(array(
  'sf_informe_dir_name'  => $sf_informe_dir_name = 'informes',
  'sf_informe_dir'       => sfConfig::get('sf_root_dir').DIRECTORY_SEPARATOR.sfConfig::get('sf_web_dir_name').DIRECTORY_SEPARATOR.sfConfig::get('sf_upload_dir_name').DIRECTORY_SEPARATOR.$sf_informe_dir_name
)); 