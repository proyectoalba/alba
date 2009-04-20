<?php

  // include base peer class
  require_once 'lib/model/om/BasePaisPeer.php';
  
  // include object class
  include_once 'lib/model/Pais.php';


/**
 * Skeleton subclass for performing query and update operations on the 'pais' table.
 *
 * Listado de los paises
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class PaisPeer extends BasePaisPeer {

    public static function getEnOrden() {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(PaisPeer::ORDEN);
        return PaisPeer::populateObjects(PaisPeer::doSelectStmt($c, null));
    }

} // PaisPeer
