<?php 
    $c = new Criteria(); 
    $c->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $sf_user->getAttribute('fk_establecimiento_id'));    
    $c->addAscendingOrderByColumn(AnioPeer::DESCRIPCION);
    $anios = AnioPeer::doSelect($c);
    $optionsAnios = array();
    $optionsAnios[""] = "--Seleccione un A&ntilde;o--";   
    foreach ($anios as $anio) {
        $optionsAnios[$anio->getId()] = $anio->getDescripcion();
    }
    echo select_tag('division[fk_anio_id]', options_for_select($optionsAnios, $division->getFkAnioId()) ) ;
?>
