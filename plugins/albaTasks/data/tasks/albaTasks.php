<?php

pake_desc( 'Listado de Usuarios' );
pake_task( 'alba-list-users', 'project_exists' );

function run_alba_list_users( $task, $args ) 
{
    $users = UsuarioPeer::doSelect(new Criteria());
    foreach ($users as $user) {
       pake_echo_action ($user->getId(),$user->getUser());
       echo "hola";
    }
}

?>
