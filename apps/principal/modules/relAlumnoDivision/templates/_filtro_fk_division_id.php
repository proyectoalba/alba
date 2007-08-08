<?php 
    $c = new Criteria(); 
    $c->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $sf_user->getAttribute('fk_establecimiento_id'));    
    $c->add(TurnoPeer::FK_CICLOLECTIVO_ID, $sf_user->getAttribute('fk_ciclolectivo_id'));
    $c->addJoin(AnioPeer::ID,DivisionPeer::FK_ANIO_ID);
    $c->addJoin(TurnoPeer::ID,DivisionPeer::FK_TURNO_ID);
    
    //$c->addAscendingOrderByColumn(AlumnoPeer::APELLIDO);
    //$c->addAscendingOrderByColumn(AlumnoPeer::NOMBRE);
    $divisiones = DivisionPeer::doSelect($c);
    $optionsDivisiones = array();
    $optionsDivisiones[""] = "";   
    foreach ($divisiones as $division) {
        $optionsDivisiones[$division->getId()] = $division->__toString();
    }
    echo select_tag('filters[fk_division_id]', options_for_select($optionsDivisiones)) ;
?>
