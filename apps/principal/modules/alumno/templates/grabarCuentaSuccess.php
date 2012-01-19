<?php 
use_helper('Javascript');

echo javascript_tag(
  remote_function(array(
    'update'  => 'cuenta',
    'url'     => 'alumno/seleccionarCuenta?id='.$id,
  ))
) ?>