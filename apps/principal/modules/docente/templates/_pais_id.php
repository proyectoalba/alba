<?php
    use_helper('Javascript');
    
    $c = new Criteria();
    $paises = PaisPeer::doSelect($c);
    if ($docente->getFkProvinciaId()) {
        $pais_selected = $docente->getProvincia()->getPais()->getId();
        $provincia_id = $docente->getFkProvinciaId();
    } else {
        $pais_selected = $paises[0]->getId();
        $provincia_id = 0;
    }
        
    echo select_tag('pais_id',objects_for_select(PaisPeer::getEnOrden(),'getId','getNombreLargo',$pais_selected));
    echo observe_field('pais_id', array(
        'update'   => 'item_provincia',
        'url'      => 'docente/cambiarPais',
        'with'     => "'pais_id=' + value"));
        
    echo javascript_tag(
        remote_function( array(
        'update'  => 'item_provincia',
        'url'     => 'docente/cambiarPais?pais_id='. $pais_selected . '&provincia_id=' . $provincia_id,
        ))
    );
?>
