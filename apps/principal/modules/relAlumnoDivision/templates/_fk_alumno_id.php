<?php 
    $c = new Criteria(); 
    $c->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $sf_user->getAttribute('fk_establecimiento_id'));    
    $c->addAscendingOrderByColumn(AlumnoPeer::APELLIDO);
    $c->addAscendingOrderByColumn(AlumnoPeer::NOMBRE);
    $alumnos = AlumnoPeer::doSelect($c);
    $optionsAlumnos = array();
    $optionsAlumnos[""] = ">>Seleccione un Alumno<<";   
    foreach ($alumnos as $alumno) {
        $optionsAlumnos[$alumno->getId()] = $alumno->getApellido() . ", " . $alumno->getNombre();
    }
    echo select_tag('rel_alumno_division[fk_alumno_id]', options_for_select($optionsAlumnos, $rel_alumno_division->getFkAlumnoId()) ) ;
?>
