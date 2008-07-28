<?php 
    $c = new Criteria(); 
    $c->add(CarreraPeer::FK_ESTABLECIMIENTO_ID, $sf_user->getAttribute('fk_establecimiento_id'));
    $c->addAscendingOrderByColumn(CarreraPeer::ORDEN);
    $carreras = CarreraPeer::doSelect($c);
    $optionsCarreras = array();
    $optionsCarreras[""] = "--Seleccione un Carrera--";   
    foreach ($carreras as $carrera) {
        $optionsCarreras[$carrera->getId()] = $carrera->getDescripcion();
    }
    echo select_tag('filters[carrera]', options_for_select($optionsCarreras, isset($filters['carrera'])? $filters['carrera']: null ) ) ;
?>
