<?php 

        $establecimiento_id = $sf_user->getAttribute('fk_establecimiento_id');
        $criteria = new Criteria();
        $criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        $criteria->addJoin(DivisionPeer::FK_TURNO_ID, TurnoPeer::ID);
        $criteria->add(TurnoPeer::FK_CICLOLECTIVO_ID,$sf_user->getAttribute('fk_ciclolectivo_id'));
        $divisiones = DivisionPeer::doSelectJoinAnioByOrden($criteria);
        $optionsDivision[]  = "";
        foreach($divisiones as $division) {
            $optionsDivision[$division->getId()] = $division->getAnio()->getDescripcion()." ".$division->getDescripcion();
        }
        echo select_tag('filters[division]', options_for_select($optionsDivision, isset($filters['division']) ? $filters['division'] : ''));

?>
