<?php
class Misc
{
    public static function use_helper($helperName)
    {
      static $loaded = array();
      if (isset($loaded[$helperName]))
      {
        return;
      }
 
      if (is_readable(sfConfig::get('sf_symfony_lib_dir').'/helper/'.$helperName.'Helper.php'))
      {
        // global helper
        include_once(sfConfig::get('sf_symfony_lib_dir').'/helper/'.$helperName.'Helper.php');
      }
      else if (is_readable(sfConfig::get('sf_app_module_dir').'/'.sfContext::getInstance()->getModuleName().'/'.sfConfig::get('sf_app_module_lib_dir_name').'/helper/'.$helperName.'Helper.php'))
      {
        // current module helper
        include_once(sfConfig::get('sf_app_module_dir').'/'.sfContext::getInstance()->getModuleName().'/'.sfConfig::get('sf_app_module_lib_dir_name').'/helper/'.$helperName.'Helper.php');
      }
      else
      {
        // helper in include_path
        include_once('helper/'.$helperName.'Helper.php');
      }
      $loaded[$helperName] = true;
    }
}
?>