<?php
$sf_symfony_lib_dir  = realpath(dirname(__FILE__).'/../../dist/symfony/lib');
$sf_symfony_data_dir = realpath(dirname(__FILE__).'/../../dist/symfony/data');

require_once $sf_symfony_lib_dir.'/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
  }
}
