<?php

class EstadosalumnosPeer extends BaseEstadosalumnosPeer
{
    public static function getEnOrden() {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(EstadosalumnosPeer::NOMBRE);
        return EstadosalumnosPeer::populateObjects(EstadosalumnosPeer::doSelectStmt($c, null));
    }

}
