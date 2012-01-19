<?php 

        $establecimiento_id = $sf_user->getAttribute('fk_establecimiento_id');
        $criteria = new Criteria();
        $criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        $divisiones = DivisionPeer::doSelectJoinAnioByOrden($criteria);
        $optionsDivision[]  = "";
        foreach($divisiones as $division) {
            $optionsDivision[$division->getId()] = $division->getAnio()->getDescripcion()." ".$division->getDescripcion();
        }
        echo select_tag('filters[division]', options_for_select($optionsDivision, isset($filters['division']) ? $filters['division'] : ''));

?>
