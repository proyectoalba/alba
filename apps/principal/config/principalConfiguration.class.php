<?php

class principalConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {

        sfConfig::add((array('sf_upload_dir_name'=> 'uploads')));
        sfConfig::add(array(
                    'sf_informe_dir_name'  => $sf_informe_dir_name = 'informes',
                    'sf_informe_dir'       => sfConfig::get('sf_root_dir').DIRECTORY_SEPARATOR.'web'.DIRECTORY_SEPARATOR.sfConfig::get('sf_upload_dir_name').DIRECTORY_SEPARATOR.$sf_informe_dir_name
              ));


  }
}
