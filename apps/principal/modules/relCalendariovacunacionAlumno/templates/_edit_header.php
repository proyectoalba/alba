<?php 
    $alumno = "";
    if($rel_calendariovacunacion_alumno->getFkAlumnoId()) {
        $alumno = " de ".$rel_calendariovacunacion_alumno->getAlumno()->getApellido().", ".$rel_calendariovacunacion_alumno->getAlumno()->getNombre();
    }

   if ($sf_params->get('action') == "create") {
?>
    <h1><?php echo __('Ingresar Calendario de Vacunaci&oacute;n'.$alumno,array()) ?></h1>
<?php } else { ?>
    <h1><?php echo __('Editar Calendario de Vacunaci&oacute;n'.$alumno,array()) ?></h1>
<?php } ?>