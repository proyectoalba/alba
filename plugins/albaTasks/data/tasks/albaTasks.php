<?php

pake_desc( 'Listado de Usuarios' );
pake_task( 'alba-list-users', 'project_exists' );

pake_desc( 'Limpiar archivos temporales');
pake_task( 'alba-clear-temp','project_exists');


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
}
?>
