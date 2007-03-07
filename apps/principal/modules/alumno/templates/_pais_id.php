<?php
    use_helper('Javascript');
    
    $c = new Criteria();
    $paises = PaisPeer::doSelect($c);
    if ($alumno->getFkProvinciaId()) {
        $pais_selected = $alumno->getProvincia()->getPais()->getId();
    } else {
        $pais_selected = 0;
    }
        
    echo select_tag('pais_id',objects_for_select($paises,'getId','getNombreLargo',$pais_selected));
    
    echo observe_field('pais_id', array(
        'update'   => 'item_provincia',
        'url'      => 'alumno/cambiarPais?vista=noMuestraMenu',
        'with'     => "'pais_id=' + value"));
?>
