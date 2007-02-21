<?php 
    $c = new Criteria(); 
    $c->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $sf_user->getAttribute('fk_establecimiento_id'));    
    $c->addAscendingOrderByColumn(AlumnoPeer::APELLIDO);
    $c->addAscendingOrderByColumn(AlumnoPeer::NOMBRE);
    $alumnos = AlumnoPeer::doSelect($c);
    $optionsAlumnos = array();
    $optionsAlumnos[""] = "";   
    foreach ($alumnos as $alumno) {
        $optionsAlumnos[$alumno->getId()] = $alumno->getApellido() . ", " . $alumno->getNombre();
    }
    echo select_tag('filters[fk_alumno_id]', options_for_select($optionsAlumnos,isset($filters['fk_alunmo_id']) ? $filters['fk_alumno_id'] : ''));
?>
