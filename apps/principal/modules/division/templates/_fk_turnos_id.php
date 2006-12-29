<?php 
    $criteriaT = new Criteria(); 
    $criteriaT->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $sf_user->getAttribute('fk_establecimiento_id'));    
    $criteriaT->addJoin(TurnosPeer::FK_CICLOLECTIVO_ID, CiclolectivoPeer::ID);
    $turnos = TurnosPeer::doSelect($criteriaT);
    $optionsTurnos = array();
    $optionsTurnos[] = ">>Seleccione un Turno<<";   
    foreach ($turnos as $turno) {
        $optionsTurnos[$turno->getId()] = $turno->getDescripcion();
    }
    asort($optionsTurnos);
    echo select_tag('division[fk_turnos_id]', options_for_select($optionsTurnos, $division->getFkTurnosId()) ) ;
?>
