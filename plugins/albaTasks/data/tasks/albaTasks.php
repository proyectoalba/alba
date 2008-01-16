<?php

pake_desc( 'Listado de Usuarios' );
pake_task( 'alba-list-users', 'project_exists' );

pake_desc( 'Limpiar archivos temporales');
pake_task( 'alba-clear-temp','project_exists');

pake_desc('[ALBA-fix] dump data to fixtures directory');
pake_task('alba-dump-data', 'project_exists');

pake_desc('[ALBA-fix] load data to fixtures directory');
pake_task('alba-load-data', 'project_exists');


function run_alba_list_users( $task, $args ) 
{

  // define constants
    define('SF_ROOT_DIR',    sfConfig::get('sf_root_dir'));
    define('SF_APP',         'principal');
    define('SF_ENVIRONMENT', 'prod');
    define('SF_DEBUG',       true);
    require_once (SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');
                      
    $databaseManager = new sfDatabaseManager();
    $databaseManager->initialize();
   
   

    $users = UsuarioPeer::doSelect(new Criteria());
    foreach ($users as $user) {
       pake_echo_action ($user->getId(), $user->getUsuario() . " [" .$user->getEmail(). "]");
    }
}

function run_alba_clear_temp ( $task, $args ) {
    pake_echo_action ('Limpiando archivos temporales...','Ok');
    pake_echo_action ("NO IMPLEMENTADO AUN");
}

/**
 * La funcion original en dist/symfony/data/tasks/sfPakePropel.php 
 * NO FUNCIONA
 * porque a la funcion dumpData() no se le pasan los parametros correctos 
 * 
 *
 * Dumps yml database data to fixtures directory.
 *
 * @example symfony dump-data frontend data.yml
 * @example symfony dump-data frontend data.yml dev
 *
 * @param object $task
 * @param array $args
 */
function run_alba_dump_data($task, $args)
{
  if (!count($args))
  {
    throw new Exception('You must provide the app.');
  }

  $app = $args[0];

  if (!is_dir(sfConfig::get('sf_app_dir').DIRECTORY_SEPARATOR.$app))
  {
    throw new Exception('The app "'.$app.'" does not exist.');
  }

  if (!isset($args[1]))
  {
    throw new Exception('You must provide a filename.');
  }

  $filename = $args[1];

  $env = empty($args[2]) ? 'dev' : $args[2];

  // define constants
  define('SF_ROOT_DIR',    sfConfig::get('sf_root_dir'));
  define('SF_APP',         $app);
  define('SF_ENVIRONMENT', $env);
  define('SF_DEBUG',       true);

  // get configuration
  require_once SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';

  $databaseManager = new sfDatabaseManager();
  $databaseManager->initialize();

  if (!sfToolkit::isPathAbsolute($filename))
  {
    $dir = sfConfig::get('sf_data_dir').DIRECTORY_SEPARATOR.'fixtures';
    pake_mkdirs($dir);
    $filename = $dir.DIRECTORY_SEPARATOR.$filename;
  }

  pake_echo_action('propel', sprintf('dumping data to "%s"', $filename));

  $data = new sfPropelData();
  
  // FIX de parametros 
  $data->dumpData($filename,'all','alba');
}


function run_alba_load_data($task, $args)
{
  if (!count($args))
  {
    throw new Exception('You must provide the app.');
  }

  $app = $args[0];

  if (!is_dir(sfConfig::get('sf_app_dir').DIRECTORY_SEPARATOR.$app))
  {
    throw new Exception('The app "'.$app.'" does not exist.');
  }

  if (count($args) > 1 && $args[count($args) - 1] == 'append')
  {
    array_pop($args);
    $delete = false;
  }
  else
  {
    $delete = true;
  }

  $env = empty($args[1]) ? 'dev' : $args[1];

  // define constants
  define('SF_ROOT_DIR',    sfConfig::get('sf_root_dir'));
  define('SF_APP',         $app);
  define('SF_ENVIRONMENT', $env);
  define('SF_DEBUG',       true);

  // get configuration
  require_once SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';

  if (count($args) == 1)
  {
    if (!$pluginDirs = glob(sfConfig::get('sf_root_dir').'/plugins/*/data'))
    {
      $pluginDirs = array();
    }
    $fixtures_dirs = pakeFinder::type('dir')->name('fixtures')->in(array_merge($pluginDirs, array(sfConfig::get('sf_data_dir'))));
  }
  else
  {
    $fixtures_dirs = array_slice($args, 1);
  }

  $databaseManager = new sfDatabaseManager();
  $databaseManager->initialize();

  $data = new sfPropelData();
  $data->setDeleteCurrentData($delete);

  foreach ($fixtures_dirs as $fixtures_dir)
  {
    if (!is_readable($fixtures_dir))
    {
      continue;
    }

    pake_echo_action('propel', sprintf('load data from "%s"', $fixtures_dir));

    $data->loadData($fixtures_dir,'alba');
  }
}

?>