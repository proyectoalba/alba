<?php 
    $criteriaT = new Criteria(); 
    $criteriaT->add(TurnosPeer::FK_CICLOLECTIVO_ID, $sf_user->getAttribute('fk_ciclolectivo_id'));    
    $turnos = TurnosPeer::doSelect($criteriaT);
    $optionsTurnos = array();
    $optionsTurnos[""] = ">>Seleccione un Turno<<";   
    foreach ($turnos as $turno) {
        $optionsTurnos[$turno->getId()] = $turno->getDescripcion();
    }
    asort($optionsTurnos);
    echo select_tag('division[fk_turnos_id]', options_for_select($optionsTurnos, $division->getFkTurnosId()) ) ;
?>
