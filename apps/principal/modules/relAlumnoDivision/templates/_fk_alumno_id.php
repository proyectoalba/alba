<?php 
    $c = new Criteria(); 

    $c->addAsColumn("id", AlumnoPeer::ID);
    $c->addAsColumn("nombre", AlumnoPeer::NOMBRE);
    $c->addAsColumn("apellido", AlumnoPeer::APELLIDO);
    $c->addAsColumn("division", DivisionPeer::DESCRIPCION);
    $c->addAsColumn("anio", AnioPeer::DESCRIPCION);

    $c->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $sf_user->getAttribute('fk_establecimiento_id'));    
    $c->addJoin(AlumnoPeer::ID, RelAlumnoDivisionPeer::FK_ALUMNO_ID, Criteria::LEFT_JOIN);
    $c->addJoin(RelAlumnoDivisionPeer::FK_DIVISION_ID, DivisionPeer::ID, Criteria::LEFT_JOIN);
    $c->addJoin(DivisionPeer::FK_ANIO_ID, AnioPeer::ID ,Criteria::LEFT_JOIN);

    $c->addAscendingOrderByColumn(AlumnoPeer::APELLIDO);
    $c->addAscendingOrderByColumn(AlumnoPeer::NOMBRE);

    
//     $alumnos = AlumnoPeer::doSelect($c);
    $alumnos = BasePeer::doSelect($c);

    $aDivision = array();
    $optionsAlumnos = array();
    $optionsAlumnos[""] = "--Seleccione un Alumno--";

    foreach ($alumnos as $alumno) {
        if($alumno[3] AND array_key_exists($alumno[0], $aDivision)) {
            $separador = ", ";
        } else {
            $separador = "";
        }
        @$aDivision["$alumno[0]"] .= ($alumno[3]) ? $separador . $alumno[4]. " / " . $alumno[3]  : ""; 
        $divisiones = ($aDivision["$alumno[0]"]) ? "( ".$aDivision["$alumno[0]"]. " )" : "";
        $alumnoNombres = $alumno[2] . ", " . $alumno[1];
        $optionsAlumnos["$alumno[0]"] =  $alumnoNombres . " " .$divisiones;
    }

    echo select_tag('rel_alumno_division[fk_alumno_id]', options_for_select($optionsAlumnos, $rel_alumno_division->getFkAlumnoId()) ) ;
?>