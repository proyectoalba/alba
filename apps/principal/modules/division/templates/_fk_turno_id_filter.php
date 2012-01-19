<?php 
    $criteriaT = new Criteria(); 
    $criteriaT->add(TurnoPeer::FK_CICLOLECTIVO_ID, $sf_user->getAttribute('fk_ciclolectivo_id'));
    $turnos = TurnoPeer::doSelect($criteriaT);
    $optionsTurnos = array();
    $optionsTurnos[""] = "--Seleccione un Turno--";   
    foreach ($turnos as $turno) {
        $optionsTurnos[$turno->getId()] = $turno->getDescripcion();
    }
    asort($optionsTurnos);
    echo select_tag('filters[fk_turno_id]', options_for_select($optionsTurnos, $sf_params->get('filters[fk_turno_id]'))) ;
?>
