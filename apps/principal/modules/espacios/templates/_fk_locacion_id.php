<?php 
    $aLocacion = Array();
    $aLocacion[""] = "--Seleccione una LocaciÃn--";
    $c = new Criteria();
    $c->add(RelEstablecimientoLocacionPeer::FK_ESTABLECIMIENTO_ID, $sf_user->getAttribute('fk_establecimiento_id'));
    $locaciones = RelEstablecimientoLocacionPeer::doSelect($c);
    foreach($locaciones as $locacion) {
        $aLocacion[$locacion->getFkLocacionId()] = $locacion->getLocacion()->getNombre();
    }    
    
    echo select_tag('espacio[fk_locacion_id]', options_for_select($aLocacion, $espacio->getFkLocacionId())); 
?>
