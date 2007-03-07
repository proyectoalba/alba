<?php

  // include base peer class
  require_once 'lib/model/om/BaseTipoivaPeer.php';
  
  // include object class
  include_once 'lib/model/Tipoiva.php';


/**
 * Skeleton subclass for performing query and update operations on the 'tipoiva' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class TipoivaPeer extends BaseTipoivaPeer {
    public static function getEnOrden(){
        $criteria = new Criteria(); 
        $criteria->addAscendingOrderByColumn(TipoivaPeer::NOMBRE);
        $tipoiva = TipoivaPeer::doSelect($criteria);
        return $tipoiva;
    }               
} // TipoivaPeer
