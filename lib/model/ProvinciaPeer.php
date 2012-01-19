<?php

  // include base peer class
  require_once 'lib/model/om/BaseProvinciaPeer.php';
  
  // include object class
  include_once 'lib/model/Provincia.php';


/**
 * Skeleton subclass for performing query and update operations on the 'provincia' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class ProvinciaPeer extends BaseProvinciaPeer {


    public static function getEnOrden($criteria = NULL) {

        if((!($criteria instanceof Criteria)) OR is_null($criteria)) {
            $criteria = new Criteria(); 
        }

//      $criteria->add(ProvinciaPeer::ESTA_BORRADO, false);    Pensado para borrado logico

        $criteria->addAscendingOrderByColumn(ProvinciaPeer::ORDEN);           
        $criteria->addAscendingOrderByColumn(ProvinciaPeer::NOMBRE_CORTO);
        $criteria->addAscendingOrderByColumn(ProvinciaPeer::NOMBRE_LARGO);
        $provincias = ProvinciaPeer::doSelect($criteria);

        return $provincias;
    }


} // ProvinciaPeer
