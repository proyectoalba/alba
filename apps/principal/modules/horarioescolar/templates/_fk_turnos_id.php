<?php
    $aTurnos = array();
    $c = new Criteria();
    $c->add(TurnosPeer::FK_CICLOLECTIVO_ID,$sf_user->getAttribute('fk_ciclolectivo_id'));
    $sqlTurnos  = TurnosPeer::doSelect($c);
    foreach($sqlTurnos as $turnos) {
        $aTurnos[$turnos->getId()] = $turnos->getDescripcion();
    }

    echo select_tag("horarioescolar[fk_turnos_id]", options_for_select($aTurnos, $horarioescolar->getFkTurnosId()));
?>